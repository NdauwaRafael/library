<script>
    export default {
        props: {
            books: {
                required: true
            },
            requests: {
                required: true
            }
        },
        data: () => ({
            canManageUsers:false,
            canViewBooks:false
        }),
        methods: {
            checkPermission: function () {
                this.$http.get('/api/permission/canManageUsers')
                    .then((response) => {
                        this.canManageUsers = response.data
                    });
                this.$http.get('/api/permission/canViewBooks')
                    .then((response) => {
                        this.canViewBooks = response.data
                    });
            },
        },
        mounted:function () {
            this.checkPermission();
        }
    }
</script>
<template>
    <div class="d_cards">
            <div class="d_cards__item">
                <div class="d_cards__item__head books">
                    <h3>All books</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>700</h3>
                    <p>There are 700 books in the library. Reading lists begin as a shelf full of hope until the year flies by, and you find yourself flooded with procrastination. </p>
                </div>
                <div class="d_cards__item__foot" v-if="canViewBooks">
                    <el-button><a href="/listbooks">Learn More</a></el-button>
                    <el-button type="primary"><a href="/listbooks">Choose</a></el-button>
                </div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head issued">
                    <h3>Issued books</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>700</h3>
                    <p>There are 700 issued books. Cheers to the books we’ve been meaning to read all these years and should probably start at some point.</p>
                </div>
                <div class="d_cards__item__foot" v-if="canViewBooks">
                    <el-button><a href="/issued">Learn More</a></el-button>
                    <el-button type="primary"><a href="/issued">Choose</a></el-button>
                </div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head active">
                    <h3>Active Requests</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>50</h3>
                    <p>There are 50 active requests that have not been addressed. We may live in challenging times, and there's no better escape than through a good book. </p>
                </div>
                <div class="d_cards__item__foot" v-if="canViewBooks">
                    <el-button><a href="/requests">Learn More</a></el-button>
                    <el-button type="primary"><a href="/requests">Choose</a></el-button>
                </div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head users">
                    <h3>All Students</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>500</h3>
                    <p>There are 500 students subscribed in the system. We’re all big readers here. So it’s no surprise that we not only read different kinds of books, but we also read in vastly different ways. </p>
                </div>
                <div class="d_cards__item__foot"  v-if="canManageUsers">
                    <el-button><a href="/users">Learn More</a></el-button>
                    <el-button type="primary"><a href="/users">Choose</a></el-button>
                </div>
            </div>
    </div>
</template>
