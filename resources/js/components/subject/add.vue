<script>
    export default {
        data: () => ({
            subject:{}
        }),
        methods: {
            submitForm:function(){
                this.$http.post('/api/subject', this.subject)
                    .then((response) => {
                        this.loading = false;
                        if (response.status == 200) {
                            var data = response.body;
                            if (data.success) {
                                this.$router.push({name:'subjects'});
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
                <el-form-item label="Subject Name" >
                    <el-input v-model="subject.name"></el-input>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" @click="submitForm('subject')">Save</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>
