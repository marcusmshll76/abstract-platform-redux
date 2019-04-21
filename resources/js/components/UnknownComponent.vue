<script>
module.exports = {
    render: function() {
        console.error( 'Component type ' + this.$props.type + ' is not defined.' );
    },
    props: ['type']
}
</script>