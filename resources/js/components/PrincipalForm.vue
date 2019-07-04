<template>
<div>
<Spin v-if="loading">
    <Icon type="ios-loading" size="18" class="spin-icon-load"></Icon>
    <div> {{ loadingtext }} </div>
</Spin>
<div v-else>
<div class="principal-section">
    <Form ref="addPrincipal" :model="create" :rules="ruleValidate" v-if="!preview">
        <div class="margin-bottom-m border-bottom full-width" v-if="!type">
            <input v-model="check" type="checkbox" class="checkbox-box">
            <div class="checkbox-p">Check this box to quickly add any Principals you have already attached to your account during Abstract’s Account Set Up. <br/>You can also manually add in other Princpals from your team below. </div>
        </div>
        <div class="row margin-top-l">
            <div class="col-xs-12 col-sm-3">
                <uploads
                    type="single"
                    title="Upload Photo"
                    action="/files"
                    elname="image"
                    scope="private"
                    :clear="clear"
                    :field="'principles' + mndex"
                    multi="no"
                    map="principles-files"
                    :path="'/fund/principles/' + mndex + '/'"
                    @done="successUpload">
                </uploads>
                <br/>
                <div class="content-form">
                    <div class="row">
                        <div class="col-xs-12">
                            <FormItem label="Principle Full Name" prop="name">
                                <Input v-model="create.name" @blur.native="handleSubmit('blur')"/>
                            </FormItem>
                        </div>
                        <div class="col-xs-12">
                            <FormItem label="Principle Company" prop="title">
                                <Input v-model="create.title" @blur.native="handleSubmit('blur')"/>
                            </FormItem>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-xs-offset-0 col-sm-offset-1 mrg-push-top">
                <FormItem label="Principle Bio" prop="bio">
                    <textarea name="bio" v-model="create.bio" @blur.native="handleSubmit('blur')"></textarea>
                </FormItem>
                <div class="btn small margin-principal-m" @click="handleAdd('addPrincipal')">+ Add Principle</div>
            </div>
            <div class="col-xs-12 col-sm-1 mrg-push-mid-top"><img src="/img/icon-large-arrow-right.svg"></div>
         </div>
     </Form>

    <Form>
     <div class="push-top-card" :style="[!preview ? {'padding-top' : '60px'} : {}]" v-if="formDynamic">
        <div class="card margin-top-m" v-for="(item, index) in formDynamic" :key="index" v-if="item.status">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="file-upload-box-filled">
                            <previews
                                class="view-principles"
                                iname="Single"
                                scope="private"
                                :user="user"
                                :field="'principles' + parseInt(index + 1)"
                                :path="'/fund/principles/' + parseInt(index + 1) + '/'"
                                :index="0"
                                section="principles-files">
                            </previews>
                            <br/><br/>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Principle Full Name</p>
                                    <input type="text" @blur.native="handleSubmit('blur')" v-model="item.name">
                                </div>
                                <div class="col-xs-12">
                                    <p>Principle Company</p>
                                    <input type="text" @blur.native="handleSubmit('blur')" v-model="item.title">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-offset-1">
                        <p class="no-margin-top">Principle Bio</p>
                        <textarea class="textarea" @blur.native="handleSubmit('blur')" v-model="item.bio"></textarea>
                        <a @click="handleRemove(index)" class="btn margin-top-m small color-white dust margin-right-m cursor-hand">Remove Principal</a>
                    </div>
                     <div class="col-xs-12 col-sm-1 mrg-push-extra-top"><img src="/img/icon-large-arrow-right.svg"></div>
                </div>
            </div>
        </div>
        </div>
    </Form>
</div>
</div>
<div class="row"  v-if="next === 'yes'">
    <div class="col-xs-6 col-sm-6">
        <div class="content-footer">
            <div  class="footer-button-back" @click="handleback()">
                <img src="/img/icon-arrow-back.svg">
                <h5>Back</h5>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6">
        <div class="content-footer">
            <a @click="handleSubmit('next')" class="btn color-white fl-right">Next</a>
        </div>
    </div>
</div>
<popup-component
    v-if="error"
    title="Existing Principles Action"
    type="recurring" 
    :user="user"
    info="<h5>You have no existing principles saved. </h5>"
    action="Got It!">
</popup-component>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
import uploads from './UploadsComponent';
import previews from './FilePreview';
export default {
    props: ['type', 'next', 'url', 'map', 'data', 'user', 'preview', 'back'],
    components: {
        uploads,
        previews
    },
    data() {
        return {
            check: false,
            mndex: 1,
            loading: false,
            loadingtext: 'Pulling existing principles, hold on',
            formDynamic: [],
            error: false,
            create: {
                bio: '',
                name: '',
                title: '',
                index: 1,
                status: 1
            },
            clear: false,
            ruleValidate: {
                name: [
                    { required: true, message: 'Principle name required', trigger: 'blur' }
                ],
                title: [
                    { required: true, message: 'Principle title required', trigger: 'blur' }
                ],
                bio: [
                    { required: true, message: 'Principle Bio required', trigger: 'blur' },
                    { type: 'string', min: 20, message: 'Introduce no less than 10 words', trigger: 'blur' }
                ]
            }
        }
    },
    watch: {
        check: function (val) {
          val === true ? this.getPrinciples() : ''
        }
    },
    created () {
        console.log(this.map)
        this.initData()
    },
    methods: {
        getPrinciples () {
            var self = this
            self.loading = true
            self.loadingtext = 'Pulling existing principles, hold on'
            axios
            .get(config.getPrinciples)
            .then(function(resp) {
            if (resp.data.status === 200) {
                let a = JSON.parse(resp.data.response)
                self.loading = false
                a.map(function (x) {
                    self.formDynamic.push(x)
                });
            } else {
                self.loading = false
                self.error = true;
            }
            })
            .catch(function(error) {
                return error
            });
        },
        initData() {
            if (this.data != '' || this.data != 'null') {
                let a = JSON.parse(this.data)
                if (typeof a === 'string' || a instanceof String) {
                    this.formDynamic = JSON.parse(a)
                    console.log(a)
                } else {
                    this.formDynamic = a
                }
            }
            this.formDynamic.length ? this.mndex = this.formDynamic.length + 1 : ''
        },
        handleSubmit(e) {
            var self = this
            axios
                .post(config.host + self.url, {
                    'principles': JSON.stringify(self.formDynamic)
                })
                .then(function(resp) {
                    console.log(resp)
                    resp.request.status === 200 && self.next === 'yes' && e === 'next' ? window.location.href = resp.data : ''
                })
                .catch(function(error) {
                    return error
                });
        },
        handleback () {
            this.back ? window.location.href = this.back : ''
        },
        successUpload(e) {
            console.log(e)
        },
        handleReset(name) {
            this.$refs['addPrincipal'].resetFields();
        },
        handleAdd(name) {
            this.$refs[name].validate((valid) => {
                if (valid) {
                    let p = Object.assign({}, this.create);
                    this.create.index = this.mndex
                    this.formDynamic.push(p)
                    this.$refs[name].resetFields()
                    this.mndex++
                    this.clear = true
                    this.handleSubmit('blur')
                } else {
                    this.$Message.error('Fail!');
                }
            })
        },
        handleRemove(index) {
            this.$Modal.confirm({
                title: 'Delete Principle',
                content: '<p>Are you sure you want to delete Principle</p>',
                okText: 'Delete',
                cancelText: 'Cancel',
                onOk: () => {
                    this.formDynamic.splice(index, 1);
                    this.handleSubmit('blur')
                },
                onCancel: () => {}
            });
        }
    }
};
</script>
<style>
.checkbox-p{
    font-family: "Montserrat" !important;
    color: #283F5C;
    float:left;
    width: calc(100% - 80px);
    margin-top: -8px;
    font-weight: 500;
    line-height: 1.5;
    margin-bottom: 10px !important;
    font-size: 13px !important;
}
.checkbox-box{
    float: left;
    margin-right: 10px;
}
</style>

<style scoped>
.margin-principal-m{
    margin: 20px 0;
}
.fl-right{
    float: right;
}
.remove-principle{
    font-size: 1.5em;
    color: rgb(255, 0, 0);
    cursor: pointer;
}
.push-top-card .card{
     padding: 30px;
}
.push-top-card .card .textarea{
    min-height: 75%;
}
input[type="checkbox"]{
    background: #283F5C;
}
input[type="checkbox"]:checked{
    background: #283F5C url("/img/icon-check-white.svg") no-repeat center !important;
}
.view-principles{
    margin-bottom: 20px !important;
}
.mrg-push-top{
    margin-top: 50px !important;
}
.mrg-push-extra-top{
    margin-top: 200px !important;
}
.mrg-push-mid-top{
    margin-top: 140px !important;
}
.principal-section{
    padding: 10px !important;
}
</style>
