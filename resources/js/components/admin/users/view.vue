<script>
    export default {
        props: {
            user: {
                required: true
            }
        },
        data: () => ({
            editUser: false
        }),
        methods: {
            update(){

            }
        },
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
                            <el-button type="primary" @click="editUser = true" icon="el-icon-edit" circle></el-button>
                            <el-button type="danger" icon="el-icon-delete" circle></el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="profile">
            <div class="profile__avatar">
                <img src="/img/user.png" alt="User Avatar">
            </div>
            <div class="profile__details">
                <div class="head">
                    <h3>{{user.firstname}} {{user.lastname}} </h3>
                    <el-button type="primary" icon="el-icon-edit">Edit</el-button>
                </div>
                <div class="description">
                    <div class="description__item">
                        <span>Username:</span>
                        <span>{{user.username}}</span>
                    </div>
                    <div class="description__item">
                        <span>Email:</span>
                        <span>{{user.email}}</span>
                    </div>
                    <div class="description__item">
                        <span>Department:</span>
                        <!--<span>{{user.department}}</span>-->
                    </div>
                    <div class="description__item">
                        <span>Role</span>
                        <!--<span>{{user.role}}</span>-->
                    </div>
                </div>
            </div>
        </div>

        <el-dialog
                title="Tips"
                :visible.sync="editUser">

            <span slot="footer" class="dialog-footer">
                <el-button @click="editUser = false">Cancel</el-button>
                <el-button type="primary" @click="update()">Update User</el-button>
            </span>
        </el-dialog>

    </div>
</template>