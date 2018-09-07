<script>
    export default {
        data: () => ({
            book: {}
        }),
        methods: {
            resetForm(formName) {
                this.$refs[formName].resetFields();
            },
            submitForm(){

            }
        },
    }
</script>
<template>
    <div class="library_page ">
        <div class="book__add">
            <el-form :model="book">
                <el-form-item label="Book Title" >
                    <el-input v-model="book.title"></el-input>
                </el-form-item>

                <el-form-item label="Author" >
                    <el-input v-model="book.author"></el-input>
                </el-form-item>

                <el-form-item label="Confirm" >
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