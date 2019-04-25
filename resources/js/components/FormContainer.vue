<template>
    <template-pane v-bind:title="Form.header" v-bind:description="Form.description" :key="componentKey" v-bind:rerender="forceRerender"></template-pane>
</template>

<script>
module.exports = {
    data() {
        return {
            componentKey: 0,
        }
    },
    methods: {
        forceRerender() {
            this.componentKey += 1;
        }
    }
}
</script>