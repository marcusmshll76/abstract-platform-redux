<template>
<div class="full-width">
    <Spin v-if="loading">
        <Icon type="ios-loading" size=18 class="spin-icon-load"></Icon>
        <div>{{ loadingtxt }}</div>
    </Spin>

    <div v-else>
        <div class="row contextArea drop" @contextmenu.prevent="$refs.menu.open">
            <nested-draggable @done="refresh" :txtindex="txt" :data="list" />
        </div>
        <vue-context ref="menu">
            <li>
                <a href="#" @click.prevent="createFolder"><Icon type="ios-folder-open" /> Create New Folder</a>
            </li>
            <li>
                <a href="#" @click.prevent="createFile"><Icon type="ios-paper-outline" /> Create New File</a>
            </li>
        </vue-context>
    </div>
    <Modal
        v-model="upload"
        title="Upload A New File"
        @on-ok="save"
        @on-cancel="cancel"
        ok-text="Save File"
        cancel-text="Cancel"
        class="upload-drag">
            <uploads-component
                type="multi-drag"
                action="//jsonplaceholder.typicode.com/posts/"
                elname="file"
                scope="private"
                path="/diligence/"
                @done="successUpload">
            </uploads-component>
    </Modal>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
import { VueContext } from 'vue-context';

export default {
    name: "file-tree",
    display: "Nested",
    order: 15,
    props: ['user'],
    components: {
        VueContext
    },
    data() {
        return {
            loading: true,
            loadingtxt: 'Preparing Diligence Documents',
            jsonDir: {},
            list: [],
            upload: false,
            txt: '',
            ref: 1
        };
    },
    created () {
        var self  =  this
        axios
        .get(config.checkDiligence)
        .then(function(resp) {
            if (resp.data.response) {
                self.dirToArray(resp.data.response)
                self.loading = false
                self.arrayToPath(self.list)
            }
        })
        .catch(function(error) {
            return error
        });
    },
    methods: {
        successUpload (e) {
            console.log(e)
        },
        dirToArray(data) {
            function addPath(pathcomponents, arr) {
                let component = pathcomponents.shift()
                let comp = arr.find(item => item.name === component)
            if (component !== '.DS_Store') {
                let type
                if (component.indexOf('.') === -1) {
                    type = 'folder'
                }
                if (!comp) {
                    comp =  {
                        name: component,
                        edit: false
                    }
                    type === 'folder' ? comp.type = 'folder' : ''
                    arr.push(comp)
                }
                if (pathcomponents.length){
                   addPath(pathcomponents, comp.data || (comp.data = []))
                }
            }
                return arr
            }
            this.list = data.reduce((arr, path) => addPath(path.split('/'), arr), [])

        },
        arrayToPath (data) {
            // Flattend Array to string path
            var flattened = [];
            function flatten(data, outputArray) {
                data.forEach(function (e){
                    if (Array.isArray(e.data)) {
                        outputArray.push(e.name);
                        flatten(e.data, outputArray);
                    } else {
                        outputArray.push(e.name);
                    }

                });
            }
            flatten(data, flattened);
            // console.log(flattened)
        },
        refresh: function (data) {
            this.list = data
        },
        createFolder: function () {
            this.list.push({
                name: 'New Folder',
                edit: true,
                type: 'folder',
                data: []
            });
        },
        createFile: function () {
            this.list.push({
                name: 'New File',
                edit: false,
                data: []
            });
            this.confirm()
            // this.upload = true
        },
        confirm () {
            const pos = this.list.length > 0 ? this.list.length-1 : 0
            this.$Modal.confirm({
                title: 'Create File Action',
                content: '<p>One last step to complete your request</p>',
                okText: 'Upload files',
                cancelText: 'Cancel',
                onOk: () => {
                    this.upload = true;
                },
                onCancel: () => {}
            });
        },
        save: function() {

        },
        cancel: function() {
            let pos = this.list.length > 0 ? this.list.length-1 : 0
            this.list.splice(pos, 1);
        }
    },
};
</script>

<style>
.upload-drag .ivu-modal-footer{
    display: none;
}
.drop{
    margin-top: 30px;
}
.drop:hover{
    /* border: dashed 1px #dddddd; */
}
.ivu-upload-drag:hover{
    border-color: #283f5c;
}
.v-context {
    outline: 0 !important;
    overflow: hidden !important;
}
.full-width{
    width: 100%;
}
.contextArea {
    width: 100%;
    min-height: 300px;
}
</style>
