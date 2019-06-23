<template>
<div class="full-width" id="file-drag-drop" v-bind:class="{ 'dragover': dragTrue }">
    <div class="row contextArea drop drop-files" ref="fileform" @contextmenu.prevent="$refs.menu.open">
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
    <Modal v-model="upload" title="Upload A New File" @on-ok="save" @on-cancel="cancel" ok-text="Save File" cancel-text="Cancel" class="upload-drag">
        <Upload multiple type="drag" action="//jsonplaceholder.typicode.com/posts/" :on-success="successBox">
            <div style="padding: 20px 0">
                <Icon type="ios-cloud-upload" size="52" style="color: #283f5c"></Icon>
                <p>Click or drag files here to upload</p>
            </div>
        </Upload>
    </Modal>
</div>
</template>

<script>
import Cookies from 'js-cookie';
import {
    VueContext
} from 'vue-context';
export default {
    props: ['struc', 'name'],
    name: "file-tree",
    display: "Nested",
    order: 15,
    components: {
        VueContext
    },
    watch: {
        list: function (n, o) {
            Cookies.set(this.struc, n, {
                expires: 364
            })
        }
    },
    data() {
        return {
            list: [],
            upload: false,
            txt: '',
            ref: 1,
            dragAndDropCapable: false,
            files: [],
            uploadPercentage: 0,
            dragTrue: false
        };
    },
    created() {
        let lup = Cookies.get(this.struc)
        if (lup != null) {
            this.list = JSON.parse(lup);
        } else {
            if (this.struc === 'diligence' && lup == 'null') {
                this.list = [{
                        name: 'Title Survey & Zoning Diligence',
                        type: 'folder',
                        edit: false,
                        data: [{
                            name: 'Title Survey & Zoning DD List',
                            edit: false
                        }]
                    },
                    {
                        name: 'Legal & Insurance Diligence',
                        type: 'folder',
                        edit: false,
                        data: [{
                            name: 'Legal & Insurance DD List ',
                            edit: false
                        }]
                    },
                    {
                        name: 'Financial Diligence',
                        type: 'folder',
                        edit: false,
                        data: [{
                            name: 'Financial DD List',
                            edit: false
                        }]
                    }
                ];
            }
            if (this.struc === 'account-settings' && lup == 'null') {
                this.list = [{
                        name: 'Sponsor Track Record',
                        type: 'folder',
                        edit: false,
                        data: []
                    },
                    {
                        name: 'CP Sponsors Historical Financials',
                        type: 'folder',
                        edit: false,
                        data: []
                    },
                    {
                        name: 'CP Entity Formation Partnership Agreement',
                        type: 'folder',
                        edit: false,
                        data: []
                    },
                    {
                        name: 'CP Articles of Incorporation & Bylaws ',
                        type: 'folder',
                        edit: false,
                        data: []
                    }
                ];
            }
            if (this.struc === 'investor-servicing' && lup == 'null') {
                this.list = [{
                    name: 'Investor Subscription Documents',
                    type: 'folder',
                    edit: false,
                    data: []
                }];
            }
            Cookies.set(this.struc, this.list, {
                expires: 364
            })
        }
        // this.preventReload()
        // this.dirJson()
    },
    mounted() {
        this.dragAndDropCapable = this.determineDragAndDropCapable();
        if (this.dragAndDropCapable) {
            // Drag actions, 'drag', 'dragstart', 'dragend',
            ['dragover', 'dragenter', 'dragleave', 'drop'].forEach(function (evt) {
                this.$refs.fileform.addEventListener(evt, function (e) {
                    evt === 'dragleave' || evt === 'drop' ? this.dragTrue = false : this.dragTrue = true;
                    e.preventDefault();
                    e.stopPropagation();
                }.bind(this), false);
            }.bind(this));

            this.$refs.fileform.addEventListener('drop', function (e) {
                for (let i = 0; i < e.dataTransfer.files.length; i++) {
                    this.files.push(e.dataTransfer.files[i]);
                }
                this.submitFiles();
            }.bind(this));
        }
    },
    methods: {
        successBox(res, file) {
            this.upload = false;
            this.list.push({
                name: file.name,
                edit: false
            });

            console.log(file)
        },
        dirJson() {
            generator.generate('/').then(function (tree) {
                console.log(JSON.stringify(tree, null, 2));
            });
        },
        preventReload() {
            window.onbeforeunload = function () {
                return "Are you sure you want to leave?";
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
            this.confirm()
            // this.upload = true
        },
        confirm() {
            const pos = this.list.length > 0 ? this.list.length - 1 : 0
            this.$Modal.confirm({
                title: 'Create File Action',
                content: '<p>One last step to complete your request</p>',
                okText: 'Upload a file',
                cancelText: 'Cancel',
                onOk: () => {
                    this.upload = true;
                },
                onCancel: () => {
                    // this.txt = pos
                }
            });
        },
        save: function () {},
        cancel: function () {
            let pos = this.list.length > 0 ? this.list.length - 1 : 0
            this.list.splice(pos, 1);
        },
        determineDragAndDropCapable() {
            var div = document.createElement('div');
            return (('draggable' in div) ||
                    ('ondragstart' in div && 'ondrop' in div)) &&
                'FormData' in window &&
                'FileReader' in window;
        },

        getImagePreviews() {
            for (let i = 0; i < this.files.length; i++) {
                if (/\.(jpe?g|png|gif)$/i.test(this.files[i].name)) {
                    let reader = new FileReader();
                    reader.addEventListener("load", function () {
                        this.$refs['preview' + parseInt(i)][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL(this.files[i]);
                } else {
                    this.$nextTick(function () {
                        this.$refs['preview' + parseInt(i)][0].src = '/images/file.png';
                    });
                }
            }
        },
        submitFiles() {
            let formData = new FormData();
            for (var i = 0; i < this.files.length; i++) {
                let file = this.files[i];
                this.list.push({
                    name: file.name,
                    edit: false
                });

                formData.append('files[' + i + ']', file);
            }
            this.files = [];

            /* Upload File with Axios
             axios.post( '/file-drag-drop-instant',
              formData,
              {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                onUploadProgress: function( progressEvent ) {
                  this.uploadPercentage = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                }.bind(this)
              }
            ).then(function(){
              console.log('SUCCESS!!');
            })
            .catch(function(){
              console.log('FAILURE!!');
            }); */
        },
        removeFile(key) {
            this.files.splice(key, 1);
        }
    },
};
</script>

<style>
.dragover {
    border: dashed 1px #999999 !important;
}

.upload-drag .ivu-modal-footer {
    display: none;
}

.drop {
    margin-top: 30px;
}

.ivu-upload-drag:hover {
    border-color: #283f5c;
}

.v-context {
    outline: 0 !important;
    overflow: hidden !important;
}

.full-width {
    width: 100%;
}

.contextArea {
    width: 100%;
    min-height: 300px;
}
</style>
