<script>
    export default {
        props: {
            user: {
                required: true
            }
        },
        data: () => ({}),
        methods: {},
    }
</script>
<template>
    <div class="lib_page">
        <div class="lib_table">
            <div class="lib_table__head"></div>
            <div class="lib_table__body">
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <el-button type="primary" icon="el-icon-edit" circle></el-button>
                            <el-button type="danger" icon="el-icon-delete" circle></el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>