<script>
    export default {
        data: function () {
            return {
                loading: false,
                formErrors: {},
                item: {
                    id: null,
                    name: '',
                },
            }
        },

        mounted: function () {
            this.getUserDetails();
        },
        methods: {
            getUserDetails: function () {
                var user_id = this.$route.params.id;
                this.$http.get('/api/user/' + user_id)
                    .then((response) => {
                        if (response.status == 200) {
                            var data = response.data;
                            if (data.fetched) {
                                this.$set(this, 'item', response.data);
                            }
                        }
                        this.$set(this, 'item', response.data);
                    }, (response) => {

                    });
            },
            updateUserDetails: function () {
                this.loading = true;
                var input = {
                    name: this.item.name,
                    active: true
                };

                this.$http.put('/api/reset/password/' + this.item.id, this.item)
                    .then((response) => {
                        this.loading = false;
                        if (response.status == 200) {
                            var data = response.body;
                            if (data.success) {
                            }
                            else {
                            }
                        }
                    }, (response) => {
                        this.loading = false;
                        this.formErrors = response.data;
                    });
            },
        }
    }
</script>

<template>

    <div class="users__add">
        <div class="grid-x">
            <div class="large-8 column medium-10 small-12">
                <form enctype="multipart/form-data" v-on:submit.prevent="updateUserDetails">

                    <label>Email</label>
                    <input type="email" placeholder="email..." v-model="item.email" multiple required>

                    <label>New Password</label>
                    <input type="password" placeholder="password..." v-model="item.password" multiple required>
                    <button class="button" type="submit">
                        Reset
                        <i class="fa fa-spinner fa-spin" v-if="loading"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>

</template>

<style scoped>

</style>
