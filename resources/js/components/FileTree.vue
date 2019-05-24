<template>
<div class="full-width">
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
    <Modal
        v-model="upload"
        title="Upload A New File"
        @on-ok="save"
        @on-cancel="cancel"
        ok-text="Save File"
        cancel-text="Cancel"
        class="upload-drag">
            <Upload
                multiple
                type="drag"
                action="//jsonplaceholder.typicode.com/posts/">
                <div style="padding: 20px 0">
                    <Icon type="ios-cloud-upload" size="52" style="color: #283f5c"></Icon>
                    <p>Click or drag files here to upload</p>
                </div>
            </Upload>
    </Modal>
</div>
</template>

<script>
import { VueContext } from 'vue-context';
// import s3tree from 's3-tree';
// const generator = s3tree({bucket: process.env.AWS_BUCKET});
export default {
    name: "nested-example",
    display: "Nested",
    order: 15,
    components: {
        VueContext
    },
    data() {
        return {
            list: [{
                    name: "Title Survey & Zoning Diligence",
                    type: "folder",
                    edit: false,
                    data: [{
                        name: "Title Survey & Zoning DD List",
                        edit: false
                    }]
                },
                {
                    name: "Legal & Insurance Diligence",
                    type: "folder",
                    edit: false,
                    data: [{
                        name: "Legal & Insurance DD List ",
                        edit: false
                    }]
                },
                {
                    name: "Financial Diligence",
                    type: 'folder',
                    edit: false,
                    data: [{
                        name: "Financial DD List",
                        edit: false
                    }]
                }
            ],
            upload: false,
            txt: '',
            ref: 1
        };
    },
    created () {
        // this.preventReload()
        // this.dirJson()
    },
    methods: {
        dirJson () {
            generator.generate('/').then(function (tree) {
                console.log(JSON.stringify(tree, null, 2));
            });
        },
        preventReload () {
            window.onbeforeunload = function() {
                return "Are you sure you want to leave? Think of the kittens!";
            }
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
                okText: 'Upload a file',
                cancelText: 'Create a text file',
                onOk: () => {
                    this.upload = true;
                },
                onCancel: () => {
                    this.txt = pos
                }
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
