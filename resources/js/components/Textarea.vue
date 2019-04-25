<template>
    <textarea v-bind:name="name" v-model="Form.state[name]"></textarea>
</template>

<script>
module.exports = {
    props: ['name']
}
</script>