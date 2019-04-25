<template>
<div class="row" id="progress-bar">
    <div class="col-md-12">
        <span class="step">
            Step <strong>{{currentStep}}</strong> of <strong>{{totalSteps}}</strong>
        </span>
        <span class="advance">
            <a v-on:click="advanceStep">Next</a>
        </span>
    </div>
</div>
</template>

<script>
module.exports = {
    props: {
        currentStep: Number,
        totalSteps: Number,
        rerender: Function,
    },
    methods: {
        advanceStep: function( e ) {
            e.preventDefault();
            this.Form.nextStep();
            this.rerender();
        }
    }
}
</script>