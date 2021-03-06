<template>
<div class="full-width" ref="fileform">
    <Row type="flex" justify="center" align="middle" v-if="loading">
        <Spin>
            <Icon type="ios-loading" size="18" class="spin-icon-load"></Icon>
            <div>{{ loadingtxt }}</div>
        </Spin>
    </Row>
    <div class="full-width" id="file-drag-drop" v-bind:class="{ 'dragover': dragTrue }" v-else>
        <div class="row contextArea drop drop-files" @contextmenu.prevent="$refs.menu.open">
           <nested-draggable @moved="moved" @done="refresh" :struc="struc" :txtindex="txt" :data="list" />
        </div>
        <vue-context ref="menu">
            <!-- <li>
                <a href="#" @click.prevent="createFolder"><Icon type="ios-folder-open" /> Create New Folder</a>
            </li> -->
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
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
import Cookies from 'js-cookie';
import {
    VueContext
} from 'vue-context';
export default {
    props: ['struc', 'name', 'owner', 'user'],
    name: "file-tree",
    display: "Nested",
    order: 15,
    components: {
        VueContext
    },
    watch: {
        list: function (n, o) {
            Cookies.remove(this.struc);
            Cookies.set(this.struc, n, {
                expires: 364
            })
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
        }
    },
    data () {
        return {
            list: [],
            loading: true,
            loadingtxt: 'Loading Diligence ...',
            upload: false,
            txt: '',
            ref: 1,
            dragAndDropCapable: false,
            files: [],
            uploadPercentage: 0,
            dragTrue: false,
            root: 1,
        };
    },
    created () {
        this.getRootFolder()
        // this.loading = false
    },
    methods: {
        getRootFolder () {
            // Get Root Folder
            var self = this
            axios.get(config.boxRootFolder)
                .then(function (resp) {
                    let a
                    resp.data.response.item_collection.entries.map(function (folder) {
                        folder.name === 'Dilligence' ? a = folder.id : ''
                    })
                    self.checkSponsorDir(a)
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        checkSponsorDir (root) {
            // Check Sponsor Dir
            var self = this
            self.loadingtxt = "Checking Sponsor Folder ..."
            axios.get(config.boxFolderItems + root)
                .then(function (resp) {
                    let a = resp.data.response.entries.find(x => x.name === self.owner + self.user)
                    if (a) {
                        self.displayAllFiles(a.id)
                    } else{
                        self.newDDList(self.owner + self.user, root)
                    }
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        createNewBoxFolder (name, parent) {
            var self = this
            self.loadingtxt = "Creating diligence folders ..."
            axios.post(config.boxCreateFolder, {
                name: name,
                parent: parent
            })
            .then(function (resp) {
                if (name === 'Investor Documents') {
                    self.displayAllFiles(parent)
                }
            })
            .catch(function (error) {
                console.log(error)
            });
        },
        displayAllFiles (root) {
            // Display Files
            var self = this
            self.loadingtxt = "Arranging Folders ..."
            axios.get(config.boxFolderItems + root)
            .then(function (resp) {
                resp.data.response.entries.map(function (folder) {
                    let dd
                    switch(folder.name) {
                      case 'Deal Documents':
                        dd = '<p><li>- Purchase Agreement</li></p><p><li>- Operating Agreement</li></p><p><li>- Private Placement Memorandum</li></p>'
                        break;
                      case 'Debt Diligence':
                        dd = '<p><li>- Note</li></p><p><li>- Deed of Trust or Mortgage</li></p><p><li>- Assignments of Leases / Rents</li></p><p><li>- Summary of Loan terms or Loan Commitment</li></p>'
                        break;
                      case 'Environmental & Property Condition':
                        dd = '<p><li>- Engineering Inspection & Report</li></p><p><li>- Soils Report</li></p><p><li>- Environmental Audit</li></p><p><li>-Phase I/II</li></p>'
                        break;
                      case 'Investor Documents':
                        dd = ''
                        break;

                      case 'Financial Diligence':
                        dd = '<p><li>- Appraisal</li></p><p><li>- Financial Statements *Past 3 years</li></p><p><li>- Historical Operating Financials</li></p><p><li>- Current Rent Roll</li></p><p><li>- Lease Analysis</li></p><p><li>- Financial Projections Model</li></p><p><li>- Argus, *If applicable</li></p>'
                        break;

                      case 'Legal & Insurance Diligence':
                        dd = '<p><li>- Ground Lease, *if any</li></p><p><li>- Any side agreements with tenants or others</li></p><p><li>- Litigation Review</li></p><p><li>- Contracts affecting Property</li></p><p><li>- Private Placement Memorandum</li></p><p><li>- Property Management Agreement</li></p><p><li>- Insurance Certificate / Declarations Page</li></p><p><li>- Corporate Resolutions of Seller, *if applicable</li></p><p><li>- Corporate Certificate of Good Standing</li></p><p><li>- Corporate Income Tax Returns for past three years, *if applicable</li></p><p><li>- Partnership Agreements, Amendments, &amp; Certificate</li></p><p><li>- Partnership Income Tax Returns, *Past 3 years</li></p><p><li>- All leases, amendments &amp; rental agreements</li></p>'
                        break;

                      case 'Title Survey & Zoning Diligence':
                        dd = '<p><li>- Title commitment and policy</li></p><p><li>- Zoning and Confirmation</li></p><p><li>- ALTA/ACSM Survey</li></p><p><li>- Final plans &amp; specifications</li></p><p><li>- Copies of easements, rights-of-way, and covenants affecting property</li></p><p><li>- Notices of any violation of building codes, zoning or other ordinances</li></p><p><li>- Estoppels from mortgagees, ground lessors &amp; tenants</li></p><p><li>- Certificates of occupancy &amp; all other permits.</li></p><p><li>- Subdivision Plat</li></p><p><li>- Utility Report</li></p><p><li>- Access Analysis</li></p><p><li>- ADA Compliance Reports</li></p><p><li>- Notices of any violation of building codes, zoning or other ordinances, laws or regulations affecting property.</li></p>'
                        break;

                      default:
                      // code block
                    }
                    self.list.push({
                        name: folder.name,
                        edit: false,
                        type: folder.type,
                        data: [{
                            name: folder.name + ' DD List',
                            edit: false,
                            list: dd
                        }]
                    });
                })
                self.loading = false
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        copyFolder (id, destination) {
            axios.post(config.boxCopyFolder, {
                id: id,
                destination: destination
            })
            .then(function (resp) {
                console.log(resp);
                return;
            })
            .catch(function (error) {
                console.log(error)
            });
        },
        newDDList (name, parent) {
            this.loadingtxt = "Creating a new Sponsor Folder ..."
            // Create Diligence Folders for First timers
            var self = this
            axios.post(config.boxCreateFolder, {
                name: name,
                parent: parent
            })
            .then(function (resp) {
                console.log(resp)
                let data = {}
                data.id = resp.data.response.id
                data.name = resp.data.response.name
                // Create new dd folders
                self.createNewBoxFolder('Title Survey & Zoning Diligence', data.id)
                self.createNewBoxFolder('Legal & Insurance Diligence', data.id)
                self.createNewBoxFolder('Financial Diligence', data.id)
                self.createNewBoxFolder('Debt Diligence', data.id)
                self.createNewBoxFolder('Environmental & Property Condition', data.id)
                self.createNewBoxFolder('Deal Documents', data.id)
                self.createNewBoxFolder('Investor Documents', data.id)
            })
            .catch(function (error) {
                console.log(error)
            });
        },
        moved (res) {
            // console.log('You moved' + res.draggedContext.element.name);
            if (this.struc) {
                Cookies.remove(this.struc);
                Cookies.set(this.struc, this.list, {
                    expires: 364
                })
            }
        },
        successBox(res, file) {
            this.upload = false;
            this.list.push({
                name: file.name,
                edit: false
            });
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
            // let pos = this.list.length > 0 ? this.list.length - 1 : 0
            // this.list.splice(pos, 1);
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
.dragArea li{
    /* list-style: none !important; */
    min-height: 30px !important;
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
