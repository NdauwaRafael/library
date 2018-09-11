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
        data: () => ({}),
        methods: {},
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
                    <p>There are 700 books in the library</p>
                </div>
                <div class="d_cards__item__foot"></div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head issued">
                    <h3>Issued books</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>700</h3>
                    <p>There are 700 issued books</p>
                </div>
                <div class="d_cards__item__foot"></div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head active">
                    <h3>Active Requests</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>50</h3>
                    <p>There are 50 active requests that have not been addressed</p>
                </div>
                <div class="d_cards__item__foot"></div>
            </div>
            <div class="d_cards__item">
                <div class="d_cards__item__head users">
                    <h3>All Students</h3>
                </div>
                <div class="d_cards__item__body">
                    <h3>500</h3>
                    <p>There are 500 students subscribed in the system</p>
                </div>
                <div class="d_cards__item__foot">
                    <el-button>Learn More</el-button>
                    <el-button type="primary">Choose</el-button>
                </div>
            </div>
    </div>
</template>