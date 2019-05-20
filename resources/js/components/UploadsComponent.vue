<template>
<div>
    <!---
        ---- 
            @params accepts
                type = string | required
                action = string | required
                title = string | optional
                icon = string | optional
        ----
    ---->
    <Upload
        ref="upload"
        v-if="type === 'single' || type === 'single-dust'" 
        :action="action"
        :on-success="success"
        :format="['jpg','jpeg','png']"
        :max-size="2048"
        :on-format-error="formatError"
        :on-exceeded-size="maxSize">
        <div class="btn dust" v-if="type === 'single-dust'">
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5>{{ !title ? 'Upload File' : title }} </h5>
        </div>
        <div class="file-upload-box" v-else>
            <img v-if="!flat" :src="icon ? icon : '/img/icon-upload.svg'">
            <h5>{{ !title ? 'Upload File' : title }} </h5>
        </div>
    </Upload>

    <!-- large -->
    <Upload
        ref="uploadPhotos"
        v-if="type === 'photos'" 
        :action="action"
        :on-success="success"
        :format="['jpg','jpeg','png']"
        :max-size="2048"
        :on-format-error="formatError"
        :on-exceeded-size="maxSize">
        <div class="photo-upload-box">
            <img :src="icon ? icon : '/img/icon-upload.svg'">
        </div>
    </Upload>
</div>
</template>

<script>
export default {
    props: ['type', 'action', 'title', 'icon'],
    
    methods: {
        success(res, file) {
            console.log(res)
        },
        formatError(file) {
            console.log(file)
            /* this.$Notice.warning({
                title: 'The file format is incorrect',
                desc: 'File format of ' + file.name + ' is incorrect, please select jpg or png.'
            }); */
        },
        naxSize(file) {
            console.log(file)
            /* this.$Notice.warning({
                title: 'Exceeding file size limit',
                desc: 'File  ' + file.name + ' is too large, no more than 2M.'
            }); */
        }
    }
}
</script>

<style scoped>
    .dust h5{
        color: #fff;
    }
</style>
