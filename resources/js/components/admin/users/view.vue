<script>
    export default {
        props: {
            users: { }
    },
        data: () => ({
            editUser: false,
            user:{ }
        }),
        methods: {
            update(){

            },
            getUserDetails:function(){
                var id = this.$route.params.id;
                this.$http.get('/api/user/' + this.users.id)
                    .then((response) => {
                        if (response.status == 200) {
                            var data = response.data;
                            if (data.fetched) {
                                this.$set(this, 'user', response.data.data);
                            }
                            else {
                            }
                        }
                    }, (response) => {
                    });
            }
        },
        mounted:function () {
            this.getUserDetails();
        }
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
                        <th>Role</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.role}}</td>
                        <td>{{user.department}}</td>
                        <td>
                            <el-button type="primary"  icon="el-icon-edit" circle>
                                <a :href="'/users/show-role/'+user.id">Edit Role</a>
                            </el-button>
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
                    <a :href="'/users/edit/' + user.id">
                        <!--<el-button size="mini" type="primary" icon="el-icon-edit">Edit</el-button>-->
                    </a>
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
                        <span>{{user.department}}</span>
                    </div>
                    <div class="description__item">
                        <span>Role</span>
                        <span>{{user.role}}</span>
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
