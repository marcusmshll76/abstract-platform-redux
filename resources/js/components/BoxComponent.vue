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
    <!-- <Modal
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
    </Modal> -->
</div>
</template>

<script>

import axios from 'axios'
import config from '../libs/index.js'
import { VueContext } from 'vue-context';

const box = new BoxSdk();

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
            access: '',
            loading: true,
            loadingtxt: 'Preparing Diligence Documents',
            jsonDir: {},
            list: [],
            upload: false,
            txt: '',
            ref: 1
        };
    },
    watch: {
        access: function (val) {
            this.access != '' ? this.rootFolder() : ''
        }
    },
    created () {
        let boxinit = document.createElement('script');
        boxinit.setAttribute('src',"/js/BoxSdk.map");
        document.head.appendChild(boxinit);
    },
    mounted () {
        this.getAccess();
        this.loading = false;
    },
    methods: {
        getAccess() {
            var self = this
            let header = document.head.querySelector("[name~=csrf-token][content]").content
            axios.get(config.boxToken, { headers: {'X-CSRF-TOKEN': header} }).then(resp => {
                self.access = resp.data.response
                return self.access
            })
        },
        createAppUser () {
            /* var sdkConfig = require('../libs/config.json');
            var sdk = BoxSDK.getPreconfiguredInstance(sdkConfig);

            // Get the service account client, used to create and manage app user accounts
            // The enterprise ID is pre-populated by the JSON configuration,
            // so you don't need to specify it here
            var adminAPIClient = sdk.getAppAuthClient('enterprise');

            adminAPIClient.users.get(adminAPIClient.CURRENT_USER_ID, null, function(err, currentUser) {
                if(err) throw err;
                console.log('Hello, ' + currentUser.name + '!');
            });

            // example:  filter user by name - aken2
            /* var requestParam = {
                qs: {
                    filter_term: 'aken2'
                }
            }; 
            requestParam,
            */
/*
            adminAPIClient.get('/users', adminAPIClient.defaultResponseHandler(function(err, data) {
            
                data.entries.forEach(function(user) {
                   console.log(user.name);

                   /* var userClient = sdk.getAppAuthClient('user', user.id);

                   // get root folder items
                    userClient.folders.getItems('0', null, function(err, data) {
                       console.log(data);
                    }); */
/*
                });
            })); */
            
        },
        rootFolder() {
            this.createAppUser()
            /* const boxClient = new box.BasicBoxClient({ accessToken: this.access });
            boxClient.folders.get({ id: "0", params: {fields: "name, path_collection"} })
              .then(function (folder) {
                  console.log(folder)
                var rootFolder = folder;
                var id = folder.id;
              })
              .catch(function (err) {
                console.log(err);
              });
            /*

            const boxSDK = require('box-node-sdk');  // Box SDK
const fs = require('fs');                // File system for config

// Fetch config file for instantiating SDK instance
const configJSON = JSON.parse(fs.readFileSync('YOUR CONFIG FILE PATH'));

// Instantiate instance of SDK using generated JSON config
const sdk = boxSDK.getPreconfiguredInstance(configJSON);


            const persistClient = new box.PersistentBoxClient({ accessTokenHandler: this.getAccess, isCallback: true });
            console.log(persistClient)
            persistClient.folders.get({ id: "0", params: {fields: "name, item_collection"} })
              .then(function (folder) {
                  console.log('ben')
                // var rootFolder = folder;
                // var id = folder.id;
              })
              .catch(function (err) {
                console.log(err);
              }); */
              
        },

        
        checkDir () {
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
           /*  var self = this
            let rootFolderId = "0";
            let folderName = "New Folder";
            persistClient.folders.create({ parent: { id: rootFolderId }, name: folderName })
              .then(function (folder) {
                self.list.push({
                    name: folder,
                    edit: true,
                    type: 'folder',
                    data: []
                });
              })
              .catch(function (err) {
                console.log(err);
              }); */
            
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
        previewFile: function (fileId) {
            persistClient.files.getEmbedLink({ id: fileId })
              .then(function (url) {
                console.log(url)
              })
              .catch(function (err) {
                console.log(err);
              });
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
