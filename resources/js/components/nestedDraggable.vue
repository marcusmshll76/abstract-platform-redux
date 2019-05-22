<template>
<draggable class="dragArea" tag="ul" :list="data" :group="{ name: 'g1' }">
    <li v-for="(path, index) in data" :key="index">
        <div>
            <Icon type="ios-folder-open" v-if="path.type" />
            <Icon type="ios-paper-outline" v-else />
            <label v-show="!path.edit" @dblclick="edit(index)"> {{ path.name }} </label>
            <input ref="rn" v-show="path.edit === true" v-model="value" v-on-clickaway="away" v-on:blur="rename(index)" @keyup.enter="rename(index)">
        </div>
            <nested-draggable :data="path.data" />
    </li>
</draggable>
</template>

<script>
import {
    directive as onClickaway
} from 'vue-clickaway';
import draggable from "vuedraggable";
export default {
    directives: {
        onClickaway: onClickaway
    },
    props: {
        data: {
            required: true,
            type: Array
        }
    },
    data() {
        return {
            value: ''
        }
    },
    components: {
        draggable
    },
    methods: {
        edit(index) {
            this.$emit('update');
            this.data[index].edit = true
            this.value = this.data[index].name
            this.$refs.rn[index].focus();
        },
        rename(index) {
            if (this.value !== '') {
                this.data[index].name = this.value
                this.data[index].edit = false
                this.value = this.data[index].name
            } else {
                this.value = this.data[index].name
            }
            this.$emit('update');
        },
        away: function() {
            // console.log(index)
            // this.rename(index)
        },
    },
    name: "nested-draggable"
};
</script>

<style>
.dragArea {
    width: 100%;
}
.dragArea .ivu-icon-ios-folder-open{
    font-size: 1.8em;
}
.dragArea .ivu-icon-ios-paper-outline{
    font-size: 1.5em;
}
.dragArea input{
 outline: none !important;
 box-shadow: none !important;
 font-size: 13px !important;
 border: solid 1px #eee !important;
 padding: 5px 10px !important;   
}
</style>
