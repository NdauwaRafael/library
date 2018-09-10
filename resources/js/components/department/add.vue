<script>
    export default {
        data: () => ({
            department:{}
        }),
        methods: {
            submitForm:function(){
                this.$http.post('/api/department', this.department)
                    .then((response) => {
                        this.loading = false;
                        if (response.status == 200) {
                            var data = response.body;
                            if (data.success) {
                                this.$router.push({name:'departments'});
                            }
                            else {
                            }
                        }
                    }, (response) => {
                    });
            },
        },
    }
</script>
<template>
    <div class="library_page ">
        <div class="book__add">
            <el-form :model="book">
                <el-form-item label="Department Name" >
                    <el-input v-model="department.name"></el-input>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" @click="submitForm('department')">Save</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>
