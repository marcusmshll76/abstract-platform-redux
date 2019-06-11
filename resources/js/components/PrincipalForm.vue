<template>
<div>
<div class="principal-section">
    <Form ref="addPrincipal" :model="create" :rules="ruleValidate" v-if="!preview">
        <div class="row margin-top-l">
            <div class="col-xs-12 col-sm-4">
                <uploads
                    type="single"
                    action="/files"
                    elname="image"
                    scope="private"
                    title="Upload Photo"
                    :path="'/fund/principles/' + mndex + '/'"
                    @done="successUpload">
                </uploads>
            </div>
            <div class="col-xs-12 col-sm-8">
                <FormItem label="Principle Bio" prop="bio">
                    <textarea name="bio" v-model="create.bio" @blur.native="handleSubmit('blur')"></textarea>
                </FormItem>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <FormItem label="Principle Full Name" prop="name">
                            <Input v-model="create.name" @blur.native="handleSubmit('blur')"/>
                        </FormItem>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <FormItem label="Principle Title" prop="title">
                            <Input v-model="create.title" @blur.native="handleSubmit('blur')"/>
                        </FormItem>
                    </div>
                </div>
            </div>
         </div>
        <div class="btn small margin-principal-m fl-right" @click="handleAdd('addPrincipal')">+ Add Principle</div>
     </Form>

    <Form>
     <div class="push-top-card" v-if="formDynamic">
        <div class="card margin-top-m" v-for="(item, index) in formDynamic" :key="index" v-if="item.status">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="file-upload-box-filled">
                            <previews
                                iname="Single"
                                scope="private"
                                :user="user"
                                :path="'/fund/principles/' + mndex + '/'"
                                :index="index">
                            </previews>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Principle Full Name</p>
                                    <input type="text" @blur.native="handleSubmit('blur')" v-model="item.name">
                                </div>
                                <div class="col-xs-12">
                                    <p>Principle Title</p>
                                    <input type="text" @blur.native="handleSubmit('blur')" v-model="item.title">
                                </div>
                            </div>
                        </div>
                        <div class="margin-top-m"><a @click="handleRemove(index)">Remove</a></div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-offset-1">
                        <p class="no-margin-top">Principle Bio</p>
                        <textarea class="textarea" @blur.native="handleSubmit('blur')" v-model="item.bio"></textarea>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </Form>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="content-footer">
            <a @click="handleSubmit('next')" class="btn margin-key-m color-white fl-right" v-if="next === 'yes'">Next</a>
        </div>
    </div>
</div>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
import uploads from './UploadsComponent';
import previews from './FilePreview';
export default {
    props: ['next', 'url', 'data', 'user', 'preview'],
    components: {
        uploads,
        previews
    },
    data() {
        return {
            mndex: 1,
            formDynamic: [],
            create: {
                bio: '',
                name: '',
                title: '',
                index: 1,
                status: 1
            },
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
    created () {
        this.initData()
        console.log(this.data)
    },
    methods: {
        initData() {
            this.data == '' || this.data == 'null' ? '' : this.formDynamic = JSON.parse(this.data)
            this.formDynamic.length ? this.mndex = this.formDynamic.length + 1 : ''
        },
        handleSubmit(e) {
            var self = this
            console.log('called')
            console.log(self.formDynamic)
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
                    this.handleSubmit()
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
                    this.formDynamic[index].status = 0;
                },
                onCancel: () => {}
            });
        }
    }
};
</script>

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
.push-top-card{
    margin-top: 120px;
}
.push-top-card .card{
     padding: 30px;
}
.push-top-card .card .textarea{
    min-height: 95%;
}
</style>
