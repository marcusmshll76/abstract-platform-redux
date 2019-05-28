<template>
<div class="full-width">
    <span v-if="error">
        <small class="error-small"><em>*</em> <span> Key deal points required </span></small>
        <br/>
    </span>
    <vue-editor v-model="content" :editorToolbar="customToolbar" @blur="saveData"></vue-editor>
        <a @click="saveData" class="btn margin-key-m color-white fl-right" v-if="next === 'yes'">Next</a>
        <br/><br/><br/><br/>
</div>
</template>

<script>
import axios from 'axios'
import config from '../libs'
import { VueEditor } from 'vue2-editor';
export default {
    props: ['data', 'next', 'url'],
    components: {
        VueEditor
    },
    data() {
        return {
            error: false,
            content: '',
            customToolbar: [
                ["bold", "italic", "underline"],
                [{ list: "ordered" }, { list: "bullet" }]
            ]
        };
    },
    created () {
        this.content = this.data
        if (this.next !== 'yes' && this.content === '') {
            this.error = true
        } else {
            this.error = false
        }
    },
    methods: {
        saveData() {
            var self = this
            axios
                .post(config.host + self.url, {
                    'key-point': self.content,
                })
                .then(function(resp) {
                    resp.request.status === 200 && self.next === 'yes' ? window.location.href = resp.data : ''
                })
                .catch(function(error) {
                    return error
                });
        }
    }
};
</script>

<style>
.full-width{
    width: 100%;
}
.text-right{
    text-align: right !important;
}
.fl-right{
    float: right !important;
}
.margin-key-m{
    margin: 20px 0;
}
</style>
