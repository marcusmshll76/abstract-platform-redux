<template>
<div>
<div class="principal-section">
    <Form ref="formDynamic">
        <div class="row margin-top-l"
            v-for="(item, index) in formDynamic.principles"
            v-if="item.status"
            :key="index">
            <div class="col-xs-12 col-sm-4">
                <uploads
                    v-if="!preview"
                    type="single"
                    action="/files"
                    elname="image"
                    scope="private"
                    title="Upload Photo"
                    path="/fund/principles/">
                </uploads>
                <previews
                    v-else
                    iname="Single"
                    scope="private"
                    :user="user"
                    path="/fund/principles/"
                    :index="index">
                </previews>
            </div>
            <div class="col-xs-12 col-sm-8">
                <p class="no-margin-top">Principle Bio <Icon title="Delete Principle" @click.native="handleRemove(index)" class="fl-right remove-principle" type="ios-close-circle-outline" /></p>
                <textarea name="principle-bio" v-model="item.bio" @blur="handleSubmit('blur')"></textarea>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <p>Principle Full Name </p><input name="principle-full-name" v-model="item.name" @blur="handleSubmit('blur')" type="text">
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <p>Principle Title </p><input name="principle-title" v-model="item.title" @blur="handleSubmit('blur')" type="text">
                    </div>
                </div>
            </div>
         </div>
        <div class="btn small margin-principal-m fl-right" @click="handleAdd">+ Add Principle</div>
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
            index: 1,
            formDynamic: {},
            dumpFields: {
                principles: [{
                    bio: '',
                    name: '',
                    title: '',
                    index: 1,
                    status: 1
                }]
            }
        }
    },
    created () {
        this.data !== '' || this.data == 'null' ? this.formDynamic = this.dumpFields : this.formDynamic = JSON.parse(this.data)
    },
    methods: {
        handleSubmit(e) {
            var self = this
            axios
                .post(config.host + self.url, self.formDynamic)
                .then(function(resp) {
                    resp.request.status === 200 && self.next === 'yes' && e === 'next' ? window.location.href = resp.data : ''
                })
                .catch(function(error) {
                    return error
                });
        },
        handleReset(name) {
            this.$refs[name].resetFields();
        },
        handleAdd() {
            this.index++;
            this.formDynamic.principles.push({
                bio: '',
                name: '',
                title: '',
                index: this.index,
                status: 1
            });
        },
        handleRemove(index) {
            this.$Modal.confirm({
                title: 'Delete Principle',
                content: '<p>Are you sure you want to delete Principle</p>',
                okText: 'Delete',
                cancelText: 'Cancel',
                onOk: () => {
                    this.formDynamic.principles[index].status = 0;
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
.principal-section{
    margin: 20px 0 80px 0;
}
.fl-right{
    float: right;
}
.remove-principle{
    font-size: 1.5em;
    color: rgb(255, 0, 0);
    cursor: pointer;
}
</style>
