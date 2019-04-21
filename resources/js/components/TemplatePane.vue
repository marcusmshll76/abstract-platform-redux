<template>
    <div>
        <h1>{{ title }}</h1>
        <div class="pane">
            <p>{{ description }}</p>
            <div class="frame">
                <div class="inner">
                    <form-body></form-body>
                    <form-progress-bar v-bind:currentStep="1" v-bind:totalSteps="5"></form-progress-bar>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: [ 'title', 'description' ]
}
</script>