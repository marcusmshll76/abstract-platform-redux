<template>
<div class="full-width">
    <draggable class="dragArea" tag="ul" :list="subdata" :group="{ name: 'g1' }">
        <li v-for="(path, index) in subdata" :key="path.name">
            <a>
                <label v-show="!path.edit" @click="handleClick(index)" :style="[path.type ? {'font-weight' : 'bold'} : '']"> 
                    <Icon type="ios-folder-open" v-if="path.type" />
                    <Icon type="ios-paper-outline" v-else />
                    {{ path.name }} 
                </label>
                <span v-show="path.edit === true">
                    <Icon type="ios-folder-open" v-if="path.type" />
                    <Icon type="ios-paper-outline" v-else />
                    <input ref="rn" v-model="value" v-on:blur="rename(index);" @keyup.enter="rename(index)">
                </span>
            </a>
                <nested-draggable :data="path.data" />
        </li>
    </draggable>
    <Modal
        v-model="editor"
        :title="doctitle"
        @on-ok="save"
        @on-cancel="cancel"
        ok-text="Save File"
        cancel-text="Cancel">
            <vue-editor v-model="content"></vue-editor>
    </Modal>
</div>
</template>

<script>
import draggable from "vuedraggable";
import { directive as onClickaway } from 'vue-clickaway';
import { VueContext } from 'vue-context';
import { VueEditor } from 'vue2-editor';
export default {
    directives: {
        onClickaway: onClickaway
    },
    props: ['data'],
    data() {
        return {
            subdata: [],
            value: '',
            refresh: 1,
            content: '<h3>Initial Content</h3>',
            editor: false,
            clickCount: 0,
            clickTimer: null,
            doctitle: ''
        }
    },
    components: {
        draggable,
        VueContext,
        VueEditor
    },
    watch: {
        data: function (val) {
            this.subdata = val
        }
    },
    created () {
        this.subdata = this.data
    },
    methods: {
        handleClick: function(index) {
            this.clickCount++
            if (this.clickCount === 1) {
              this.clickTimer = setTimeout(() => {
                this.clickCount = 0
                this.openEditor(index)
              }, 450)
            }
            if (this.clickCount === 2) {
                this.edit(index)
                clearTimeout(this.clickTimer)
                this.clickCount = 0
            }
        },
        edit: function(index) {
            this.$emit('done', this.data)
            this.data[index].edit = true
            this.value = this.data[index].name
            this.$refs.rn[index].focus()
        },
        rename: function(index) {
            if (this.value !== '') {
                this.data[index].name = this.value
                this.data[index].edit = false
                this.value = this.data[index].name
            } else {
                this.data[index].edit = false
                this.value = this.data[index].name
            }
            this.$emit('done', this.data)
        },
        openEditor: function(index) {
            this.editor = true
            this.doctitle = this.data[index].name;
        },
        save: function() {
            // You have the content to save
            console.log(this.content)
        },
        cancel: function() {
            console.log('cancelled')
        }
    },
    name: "nested-draggable"
};
</script>

<style>
.dragArea {
    width: 100%;
     min-height: 15px;
}
.dragArea .ivu-icon-ios-folder-open{
    font-size: 2.2em;
    color: #293F5C;
}
.dragArea .ivu-icon-ios-paper-outline{
    font-size: 1.8em;
}
.dragArea input{
color: #283F5C;
 outline: none !important;
 box-shadow: none !important;
 font-size : '1em' !important;
 border: solid 1px #eee !important;
 padding: 5px 10px !important;   
}
.dragArea label{
    color: #283F5C;
    font-size : '1em';
}
</style>
