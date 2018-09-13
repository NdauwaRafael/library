<template>
    <ul class="vertical menu accordion-menu" data-accordion-menu>
        <li>
            <a href="/">Dashboard</a>
        </li>

        <li>
            <a href="#">Books</a>
            <ul class="menu vertical nested">
                <li><a href="/issued">Issued Books</a></li>
                <li><a href="/listbooks">all Books</a></li>
                <li v-if="canManageLibrary"><a href="/addbook">Add Book</a></li>
            </ul>
        </li>

        <li v-if="canManageLibrary">
            <a href="/requests">Requests</a>
        </li>

        <li v-if="canManageLibrary">
            <a href="#">Users</a>

            <ul class="menu vertical nested">
                <li><a href="/users">View Users</a></li>
            </ul>

        </li>

        <li v-if="canManageLibrary">
            <a href="#">Roles & Permissions</a>
            <ul class="menu vertical nested">
                <li><a href="/roles">Roles</a></li>
            </ul>
        </li>

        <li v-if="canManageLibrary">
            <a href="#">Subject</a>
            <ul class="menu vertical nested">
                <li><a href="/subjects">Subjects</a></li>
            </ul>
        </li>

        <li v-if="canManageLibrary">
            <a href="#">Department</a>
            <ul class="menu vertical nested">
                <li><a href="/departments">Departments</a></li>
            </ul>
        </li>

    </ul>
</template>

<script>
    export default {
        data: () => ({
            canManageLibrary:true
        }),
        methods: {
            checkPermission: function () {
                this.$http.get('/api/permission/canManageLibrary')
                    .then((response) => {
                        this.canManageLibrary = response.data
                    });
            },
        },
        mounted:function () {
            this.checkPermission();
        }
    }
</script>

<style scoped>

</style>
