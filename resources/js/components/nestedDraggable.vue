<template>
<div class="dd-list">
    <draggable class="dragArea" tag="ul" :move="moved" :list="subdata" :group="{ name: 'g1' }">
        <li v-for="(path, index) in subdata" :key="path.name">
            <a>
                <label v-show="!path.edit" @click="handleClick(index)" :style="[path.type ? {'font-weight' : 'bold'} : '']"> 
                    <Icon type="ios-folder-open" v-if="path.type" />
                    <Icon type="ios-paper-outline" v-else />
                    {{ path.name }} 
                </label>
                <span v-show="path.edit === true">
                    <Icon type="ios-folder-open" v-if="path.type === 'folder'" />
                    <Icon type="ios-paper-outline" v-else />
                    <input v-model="value" v-on:blur="rename(index);" @keyup.enter="rename(index)">
                </span>
            </a>
            <nested-draggable @moved="moved" :data="path.data" />
        </li>
    </draggable>
    <Modal v-model="editor" title="Man" class="dd-list">
        <p slot="header">
            <Icon type="ios-paper-outline" /> {{ data[0] ? data[0].name : '' }}
        </p>
        <!-- <vue-editor v-model="data[0].list" :editor-toolbar="customToolbar"></vue-editor> -->
        <span class="list-dd" v-html="data[0].list"></span>
        <span slot="footer"></span>
    </Modal>
</div>
</template>

<script>
import draggable from "vuedraggable";
import {
    directive as onClickaway
} from 'vue-clickaway';
import {
    VueContext
} from 'vue-context';
import {
    VueEditor
} from 'vue2-editor';
export default {
    directives: {
        onClickaway: onClickaway
    },
    props: ['data', 'txtindex'],
    data() {
        return {
            subdata: [],
            value: '',
            refresh: 1,
            content: 'Diligence list here, preview only',
            customToolbar: [],
            editor: false,
            clickCount: 0,
            clickTimer: null,
            docindex: 1
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
            console.log(val)
        },
        txtindex: function (val) {
            this.openEditor(val)
        }
    },
    created() {
        this.subdata = this.data
    },
    methods: {
        moved: function (evt) {
            this.$emit('moved', evt)
        },
        handleClick: function (index) {
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
        edit: function (index) {
            this.$emit('done', this.data)
            this.data[index].edit = true
            this.value = this.data[index].name
        },
        rename: function (index) {
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
        openEditor: function (index) {
            this.docindex = index
            this.editor = true
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

.dragArea .ivu-icon-ios-folder-open {
    font-size: 2.2em;
    color: #293F5C;
}

.dragArea .ivu-icon-ios-paper-outline {
    font-size: 1.8em;
}

.dragArea input,
.ivu-modal-header input {
    color: #283F5C;
    outline: none !important;
    box-shadow: none !important;
    font-size: 12px !important;
    border: solid 1px #eee !important;
    padding: 5px 10px !important;
}

.ivu-modal-header p,
.ivu-modal-header-inner {
    height: 30px !important;
}

.dragArea label {
    color: #283F5C;
    font-size: '1em';
}
.list-dd li{
    list-style:circle;
    padding-left: 20px !important;
    border-bottom: solid 1px #f1f1f1;
    padding: 10px 0 !important;
    color: #000000 !important;
}
.dd-list .ivu-modal-header p, .ivu-modal-header-inner{
    height: 20px !important;
}
.dd-list .ivu-modal-header{
    padding-bottom: 0 !important;
}
.dd-list .ivu-modal-footer{
    display: none !important;
}
@media (min-width:900px) {
   .dd-list .ivu-modal{
        width: 700px !important;
    }
}
.dd-list .ivu-modal-body{
 height: 400px !important;
 overflow-y: scroll !important;
}
</style>
