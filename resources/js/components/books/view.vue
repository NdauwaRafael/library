<script>
    export default {
        props: {
            book: {
                required: true
            },
            user: {
                required: true
            }
        },
        data: () => ({
            reserveBook: false,
            deleteBook: false,
            editBook: false,
            details: {}
        }),
        methods: {
            reserveBook(){
                    this.details.user_id =  this.user.id;
                    this.details.book_id =  this.book.id;
                    this.$http.post('/api/book/reserve', details)
                        .then(({data})=>{
                                this.$notify({
                                    title: 'Success',
                                    message: 'Request sent successfully, you will be notified back within 24 hours if the request was successful.',
                                    type: 'success'
                                });
                        },
                            ()=>{

                            })
            },
            deleteBook(){},
            editBook(){}
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
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Subject</th>
                        <th>Added on</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>{{book.title}}</td>
                        <td>{{book.author}}</td>
                        <td>{{book.subject}}</td>
                        <td>{{book.created_at}}</td>
                        <td>
                            <el-button type="primary" @click="editBook = true" icon="el-icon-edit" circle></el-button>
                            <el-button icon="el-icon-message" @click="deleteBook = true" >Request</el-button>
                            <el-button type="danger" icon="el-icon-delete" @click="deleteBook = true" circle></el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="lib_table__foot">
                <div class="description">
                    <h3>Book Synopsis</h3>
                    <p></p>
                </div>
            </div>

        </div>

        <el-dialog
                title="Edit Book"
                :visible.sync="editBook">

            <span slot="footer" class="dialog-footer">
                <el-button @click="editBook = false">Cancel</el-button>
                <el-button type="primary" @click="editBook()">Update Book Details</el-button>
            </span>
        </el-dialog>
        <el-dialog
                title="Reserve book"
                :visible.sync="reserveBook">
            <el-form ref="form" :model="details" labelPosition="top" >
                <el-form-item label="Pick Up Date">
                    <el-date-picker
                            v-model="details.issue_date"
                            type="date"
                            placeholder="Pick a day">
                    </el-date-picker>
                </el-form-item>
                <el-form-item label="Return Date">
                    <el-date-picker
                            v-model="details.return_date"
                            type="date"
                            placeholder="Pick a day">
                    </el-date-picker>
                </el-form-item>
            </el-form>
            <span slot="footer" class="dialog-footer">
                <el-button @click="reserveBook = false">Cancel</el-button>
                <el-button type="primary" @click="reserveBook()">Reserve Book</el-button>
            </span>
        </el-dialog>
        <el-dialog
                title="Delete Book"
                :visible.sync="deleteBook">

            <span slot="footer" class="dialog-footer">
                <el-button @click="deleteBook = false">Cancel</el-button>
                <el-button type="primary" @click="deleteBook()">Reserve Book</el-button>
            </span>
        </el-dialog>

    </div>
</template>
