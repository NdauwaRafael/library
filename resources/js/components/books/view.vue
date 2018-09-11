<script>
    export default {

        data: () => ({
            reserveBook: false,
            canReserveBook: false,
            deleteBook: false,
            editBook: false,
            details: {},
            book: { },
            user: {}

        }),
        methods: {
            reserveABook(){
                    this.details.user_id =  this.user.id;
                    this.details.book_id =  this.$route.params.id;
                    this.$http.post('/api/book/reserve', this.details)
                        .then(({data})=>{
                                this.$notify({
                                    title: 'Success',
                                    message: 'Request sent successfully, you will be notified back within 24 hours if the request was successful.',
                                    type: 'success'
                                });
                               this.reserveBook = false;
                                this.details = {};
                                window.location.href = "/requests";
                        },
                            ()=>{

                            })
            },
            getBookDetails:function(){
                var id = this.$route.params.id;
                this.$http.get('/api/book-details/' + id)
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
            },
            deleteABook(){},
            editABook(){},
            checkPermission: function () {
                this.$http.get('/api/permission/cANManage')
                    .then((response) => {
                        this.canReserveBook = response.data
                    });
            },
        },
        mounted:function () {
          this.checkPermission();
          this.getBookDetails();
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
                            <!--<el-button type="primary" @click="editBook = true" icon="el-icon-edit" circle></el-button>-->
                            <!--<el-button type="danger" icon="el-icon-delete" @click="deleteBook = true" circle></el-button>-->
                            <el-button icon="el-icon-message" @click="reserveBook = true" >Request</el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="description">
                <h5>Book Synopsis</h5>
                <p>{{book.synopsis}}</p>
            </div>

        </div>

        <el-dialog
                title="Edit Book"
                :visible.sync="editBook">

            <span slot="footer" class="dialog-footer">
                <el-button @click="editBook = false">Cancel</el-button>
                <el-button type="primary" @click="editABook()">Update Book Details</el-button>
            </span>
        </el-dialog>
        <el-dialog
                title="Reserve book"
                :visible.sync="reserveBook">
            <el-form ref="form" :model="details" labelPosition="top" style="width: 100%" >
                <el-form-item label="Pick Up Date"  label-width="100%">
                    <el-date-picker
                            v-model="details.issue_date"
                            type="date"
                            placeholder="Pick a day">
                    </el-date-picker>
                </el-form-item>
                <el-form-item label="Return Date"  label-width="100%">
                    <el-date-picker
                            v-model="details.return_date"
                            type="date"
                            placeholder="Pick a day">
                    </el-date-picker>
                </el-form-item>
            </el-form>
            <span slot="footer" class="dialog-footer">
                <el-button @click="reserveBook = false">Cancel</el-button>
                <el-button type="primary" @click="reserveABook()">Reserve Book</el-button>
            </span>
        </el-dialog>
        <el-dialog
                title="Delete Book"
                :visible.sync="deleteBook">

            <span slot="footer" class="dialog-footer">
                <el-button @click="deleteBook = false">Cancel</el-button>
                <el-button type="primary" @click="deleteABook()">Reserve Book</el-button>
            </span>
        </el-dialog>

    </div>
</template>
