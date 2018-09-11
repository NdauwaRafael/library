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
            book: {},
            approving: false,
            rejecting: false
        }),
        methods: {
            approveRequest(){
                this.approving = true;
                this.request.status = 'approved';
                this.$http.post('/api/request/approve/' + this.request.id, this.request)
                    .then(({data})=>{
                            this.$notify({
                                title: 'Success',
                                message: 'Request has been Approved!!',
                                type: 'success'
                            });
                            this.approving = false;
                            this.approve = false;
                            window.location.href
                        },
                        ()=>{
                            this.approving = false;
                            this.approve = false;
                        })
            },
            rejectRequest(){
                this.request.status = 'rejected';
                this.rejecting = true;
                this.$http.post('/api/request/reject/' + this.request.id, this.request)
                    .then(({data})=>{
                            this.$notify({
                                title: 'Success',
                                message: 'Request has been rejected,',
                                type: 'success'
                            });
                            this.rejecting = false;
                            this.reject = false;
                            window.location.href
                        },
                        ()=>{
                            this.rejecting = false;
                            this.reject = false;
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
                            <el-button type="primary" v-show="book.status == 'Pending'" @click="approve = true" icon="el-icon-success" circle></el-button>
                            <el-button type="danger" v-show="book.status == 'Pending'" icon="el-icon-delete" @click="reject = true" circle></el-button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

        <el-dialog
                title="Approve Request"
                :visible.sync="approve">

            <span slot="footer" class="dialog-footer" v-loading="rejecting">
                <el-button @click="editBook = false">Cancel</el-button>
                <el-button type="primary" @click="approveRequest()">Update Book Details</el-button>
            </span>
        </el-dialog>

        <el-dialog
                title="Reject Request"
                :visible.sync="reject">

            <span slot="footer" class="dialog-footer" v-loading="approving">
                <el-button @click="deleteBook = false">Cancel</el-button>
                <el-button type="primary" @click="rejectRequest()">Reserve Book</el-button>
            </span>
        </el-dialog>

    </div>
</template>
