<template>
    <div>
        <h1>{{ title }}</h1>
        <div class="pane">
            <p>{{ description }}</p>
            <div class="frame">
                <div class="inner">
                    <form-body></form-body>
                    <form-progress-bar v-bind:currentStep="Form.currentStep" v-bind:totalSteps="Form.totalSteps" v-bind:rerender="rerender"></form-progress-bar>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: [ 'title', 'description', 'rerender' ],
}
</script>