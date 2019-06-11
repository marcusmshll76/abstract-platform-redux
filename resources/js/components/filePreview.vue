<template>
<div class="filePreview">  
    <Spin v-if="loading">
        <Icon type="ios-loading" size=18 class="spin-icon-load"></Icon>
        <div>{{ loadingtxt }}</div>
    </Spin> 
    <div v-else>

        <!--- Display Static indexes -->
        <div class="row" v-if="iname === 'Digital Security Photo Gallery'">
            <div class="col-xs-12 col-md-6" v-if="files[0]">
                <div class="porperty-image large margin-bottom-m-md">
                    <div class="image-close"></div><img :src="files[0].src"></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="row margin-bottom-m">
                    <div class="col-xs-12 col-sm-6" v-if="files[1]">
                        <div class="porperty-image margin-bottom-m-md">
                            <div class="image-close"></div><img :src="files[1].src"></div>
                    </div>
                    <div class="col-xs-12 col-sm-6" v-if="files[2]">
                        <div class="porperty-image">
                            <div class="image-close"></div><img :src="files[2].src"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6" v-if="files[3]">
                        <div class="porperty-image margin-bottom-m-md">
                            <div class="image-close"></div><img :src="files[3].src"></div>
                    </div>
                    <div class="col-xs-12 col-sm-6" v-if="files[4]">
                        <div class="porperty-image">
                            <div class="image-close"></div><img :src="files[4].src"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--- Display Single Images -->
        <img v-if="iname === 'Single'" class="single" :src="files[index].src" />

        <!--- Display Nultiple Images 
            @Todo
        -->

        <!--- Download Files -->
        <ul v-if="iname === 'file'">
            <li v-for="(a, i) in files" :key="i">
                <a :href="a.src" target="_blank" download>{{ a.name ? a.name.split(/[\/ ]+/).pop() : '' }} <Icon type="md-cloud-download" /></a>
            </li>
        </ul>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
export default {
    props: ['user', 'path', 'scope', 'iname', 'index'],
    data () {
        return {
            files: [],
            loading: true,
            loadingtxt: 'Loading Files, Please Hold On'
        }
    },
    created () {
        var self = this
        const url = self.scope === 'private' ? self.user ? '?user=' + self.user + '&&path=' + self.path : false : 'public?path=' + self.path
        
        if (url !== false) {
            axios
            .get(config.getFiles + url)
            .then(function(resp) {
              self.files = resp.data
              self.loading = false
            })
            .catch(function(error) {
                return error
            });
        } else {
            self.loadingtxt = 'Access Denied, File not found'
        }
    }
}
</script>
<style scoped>
    .single{
        width: 100%;
        height: auto;
    }
    .filePreview{
        min-height: 150px;
    }
</style>
