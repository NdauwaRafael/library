<template>
    <div></div>
</template>

<script>
    export default {
        props: ['message', 'level'],
        watch: {
            message: {
                handler: function () {
                    console.log('message', this.message );
                }
            }
        },
        methods: {
            display(){
                if(this.message != '') {
                    if(this.level == 'success') {
                        toastr.success(this.message, {timeOut: 5000});
                    }else if(this.level == 'warning') {
                        toastr.warning(this.message, {timeOut: 5000});
                    }
                    else if(this.level == 'danger') {
                        toastr.error(this.message, {timeOut: 5000});
                    }
                    else {
                        toastr.info(this.message, {timeOut: 5000});
                    }
                }

            }

        },
        mounted(){
            this.display()
        }
    }
</script>
