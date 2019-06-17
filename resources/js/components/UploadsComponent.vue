<template>
<div>
    <!---
        ---- 
            @params accepts
                type = string | required
                action = string | required
                path = string | required
                title = string | optional
                icon = string | optional
        ----
    ---->
    <Spin v-if="loader" style="height:100px !important;">
        <Icon type="ios-checkmark-circle-outline" size="22" class="color-green" v-if="sus" />
        <Icon type="ios-loading" size="18" class="spin-icon-load" v-else></Icon>
        <div>{{ loadertext }}</div>
    </Spin>
    <div v-else>
    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="upload"
        v-if="type === 'single' || type === 'single-dust'" 
        :action="action"
        :on-progress="progress"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <div class="btn dust" v-if="type === 'single-dust'">
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5><Icon type="md-checkmark" v-if="sus" /> {{ !title ? 'Upload File' : title }} </h5>
        </div>
        <div class="file-upload-box" v-else>
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5><Icon type="md-checkmark" v-if="sus" /> {{ !title ? 'Upload File' : title }} </h5>
        </div>
    </Upload>

    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="uploadPhotos"
        v-if="type === 'photos'" 
        :action="action"
        :on-progress="progress"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <div class="photo-upload-box">
            <img :src="src ? src : '/img/icon-upload.svg'">
        </div>
    </Upload>

    <Upload
        multiple
        type="drag"
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="uploadPhotos"
        v-if="type === 'multi-drag'" 
        :action="action"
        :on-progress="progress"
        :on-success="success"
        :data="payload">
        <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #283f5c"></Icon>
            <p><Icon type="md-checkmark" v-if="sus" /> Click or drag files here to upload</p>
        </div>
    </Upload>

    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="upload"
        v-if="type === 'text'" 
        :action="action"
        :on-progress="progress"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <a class="upload-text"><Icon type="md-checkmark" v-if="sus" /> {{ !title ? 'Upload File' : title }}</a>
    </Upload>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
export default {
    props: ['type', 'action', 'title', 'field', 'multi', 'icon', 'flat', 'path', 'elname', 'scope', 'refresh'],
    data () {
        return {
            loadertext: 'Uploading file',
            loader: '',
            sus: false,
            header: '',
            src: '',
            payload: {}
        }
    },
    mounted(){
        console.log(this.field)
        this.payload = { 
            structure: this.path, 
            access: this.scope,
            multi: this.multi,
            field: this.field
        }
        this.header = document.head.querySelector("[name~=csrf-token][content]").content
    },
    methods: {
        getImage (res) {
            var self = this
            let user =  res.path.indexOf('/') > -1 ? res.path.split('/')[0] : ''

            axios
            .get(config.getFiles + '?user=' + user + '&&field=' + res.field)
            .then(function(resp) {
                
                resp.data.map(function (x) {
                    if (x.path === res.path) {
                        self.src = x.src
                    }
                });
                console.log(self.src)
            })
            .catch(function(error) {
                return error
            })
        },
        success(res, file) {
            this.type === 'photos' ? this.getImage(res.response) : '' 
            this.sus = true
            this.loadertext = 'File Uploaded'
            var self = this
            setTimeout(function(){ 
                self.loader = false; 
                self.loadertext = 'Uploading File';
            }, 2000);
            this.refresh === 'true' ? window.location.reload() : ''

            this.$emit('done', res)
        },
        progress (event) {
            this.loader = true
        },
        maxSize(file) {}
    }
}
</script>

<style scoped>
    .dust h5{
        color: #fff;
    }
    .upload-text:hover{
        text-decoration: underline !important;
    }
    .color-green{
        color: #2c9e1d;
    }
</style>
