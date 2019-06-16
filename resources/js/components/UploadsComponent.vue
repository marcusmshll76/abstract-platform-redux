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
    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="upload"
        v-if="type === 'single' || type === 'single-dust'" 
        :action="action"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <div class="btn dust" v-if="type === 'single-dust'">
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5>{{ !title ? 'Upload File' : title }} </h5>
        </div>
        <div class="file-upload-box" v-else>
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5>{{ !title ? 'Upload File' : title }} </h5>
        </div>
    </Upload>

    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="uploadPhotos"
        v-if="type === 'photos'" 
        :action="action"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <div class="photo-upload-box">
            <img :src="icon ? icon : '/img/icon-upload.svg'">
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
        :on-success="success"
        :data="payload">
        <div style="padding: 20px 0">
            <Icon type="ios-cloud-upload" size="52" style="color: #283f5c"></Icon>
            <p>Click or drag files here to upload</p>
        </div>
    </Upload>

    <Upload
        :name="elname"
        :headers="{'X-CSRF-TOKEN': header}"
        ref="upload"
        v-if="type === 'text'" 
        :action="action"
        :on-success="success"
        :max-size="2048"
        :on-exceeded-size="maxSize"
        :data="payload">
        <a class="upload-text">{{ !title ? 'Upload File' : title }}</a>
    </Upload>
</div>
</template>

<script>
export default {
    props: ['type', 'action', 'title', 'field', 'multi', 'icon', 'flat', 'path', 'elname', 'scope'],
    data () {
        return {
            header: '',
            payload: {}
        }
    },
    mounted(){
        this.payload = { 
            structure: this.path, 
            access: this.scope,
            multi: this.multi,
            field: this.field
        }
        this.header = document.head.querySelector("[name~=csrf-token][content]").content
    },
    methods: {
        success(res, file) { 
            console.log(res)
            this.$emit('done', res)
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
</style>
