<script>
    export default {
         props: {
             issue: {
                 required: true
             }
         },
        data: () => ({
            approve: false,
            reject: false,
            request: {},
            book: {}
        }),
        methods: {
            approveRequest(){
                this.request.status = 'approved';
                this.$http.post('/api/request/approve/' + this.request.id, this.request)
                    .then(({data})=>{
                            this.$notify({
                                title: 'Success',
                                message: 'Request has been Approved!!',
                                type: 'success'
                            });
                        },
                        ()=>{

                        })
            },
            rejectRequest(){
                this.request.status = 'rejected';
                this.$http.post('/api/request/reject/' + this.request.id, this.request)
                    .then(({data})=>{
                            this.$notify({
                                title: 'Success',
                                message: 'Request has been rejected,',
                                type: 'success'
                            });
                        },
                        ()=>{

                        })
            },
        },
         mounted(){
             this.request = this.issue;
             this.book = this.issue;

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
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Borrower</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>{{book.book}}</td>
                        <td>{{book.issue_date}}</td>
                        <td>{{book.return_date}}</td>
                        <td>{{book.user}}</td>
                        <td>
                            <el-button type="primary" @click="approve = true" icon="el-icon-success" circle></el-button>
                            <el-button type="danger" icon="el-icon-delete" @click="reject = true" circle></el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <el-dialog
                title="Approve Request"
                :visible.sync="approve">

            <span slot="footer" class="dialog-footer">
                <el-button @click="editBook = false">Cancel</el-button>
                <el-button type="primary" @click="approveRequest()">Update Book Details</el-button>
            </span>
        </el-dialog>

        <el-dialog
                title="Reject Request"
                :visible.sync="reject">

            <span slot="footer" class="dialog-footer">
                <el-button @click="deleteBook = false">Cancel</el-button>
                <el-button type="primary" @click="rejectRequest()">Reserve Book</el-button>
            </span>
        </el-dialog>

    </div>
</template>
