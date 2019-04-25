<template>
    <fieldset v-bind:class="styleClass">
        <label>{{label}}</label>
        <input type="email" v-bind:name="name" v-model="Form.state[name]" />
    </fieldset>
</template>

<script>
module.exports = {
    props: {
        label: String,
        name: String,
        colWidth: String
    },
    computed: {
        isInline: function() {
            return this.$parent['_vnode']['data']['staticClass'] == "row";
        },
        col: function() {
            if( typeof( this.colWidth ) != 'undefined' ) {
                return this.colWidth;
            }

            return false;
        },
        styleClass: function() {
            let styleClass = {};
            styleClass['inline'] = this.isInline;

            if( this.col ) {
                styleClass[ this.col ] = true;
            }

            return styleClass;
        }
    }
}
</script>