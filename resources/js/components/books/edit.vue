<script>
    export default {
        data: () => ({
            book: {},
            subjects: []
        }),
        methods: {
            resetForm(formName) {
                this.$refs[formName].resetFields();
            },
            submitForm: function () {
                var id = this.$route.params.id;
                this.$http.put('/api/book/' + id, this.book)
                    .then((response) => {
                        this.loading = false;
                        if (response.status == 200) {
                            var data = response.body;
                            this.$router.push({ name: 'list.book' });
                        }
                    }, (response) => {
                    });
            },

            getSubjectList: function () {
                this.$http.get('/api/subject')
                    .then((response) => {
                        if (response.status == 200) {
                            var data = response.data;
                            if (data.fetched) {
                                this.$set(this, 'subjects', response.data.data);
                            }
                            else {
                            }
                        }
                    }, (response) => {
                    });
            },

            getBookDetails:function(){
                var id = this.$route.params.id;
                this.$http.get('/api/book/' + id)
                    .then((response) => {
                        if (response.status == 200) {
                            var data = response.data;
                            if (data.fetched) {
                                this.$set(this, 'book', response.data.data);
                            }
                            else {
                            }
                        }
                    }, (response) => {
                    });
            }
        },
        mounted:function(){
            console.log('subjects',this.subjects)
            this.getSubjectList();
            this.getBookDetails();
        }
    }
</script>
<template>
    <div class="library_page ">
        <div class="book__add">
            <el-form :model="book">
                <el-select v-model="book.subject_id" clearable placeholder="Select">
                    <el-option
                        v-for="item in subjects"
                        :key="item.value"
                        :label="item.label"
                        :value="item.value">
                    </el-option>
                </el-select>

                <el-form-item label="Book Title">
                    <el-input v-model="book.title"></el-input>
                </el-form-item>

                <el-form-item label="Author">
                    <el-input v-model="book.author"></el-input>
                </el-form-item>

                <el-form-item label="Confirm">
                    <el-input
                        type="textarea"
                        :rows="5"
                        placeholder="Add Book Summary"
                        v-model="book.synopsis">
                    </el-input>
                </el-form-item>

                <el-form-item>
                    <el-button type="primary" @click="submitForm('book')">Submit</el-button>
                    <el-button @click="resetForm('book')">Reset</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>
