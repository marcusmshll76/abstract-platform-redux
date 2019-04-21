<template>
    <div v-bind:class="size">
        <slot></slot>
    </div>
</template>
<script>
module.exports = {
    props: {
        size: String,
    }
}
</script>