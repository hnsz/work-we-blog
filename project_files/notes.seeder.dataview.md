# Part _0 / Post : Replyable

* run UC { I, a = 01, b on a = 01b, a after a = 02,   }
* I:  u_0, u_1; Ia: u_0a0 -> u_0, u_0a1; Ib: u_1b0 -> u_1b1;
* _0 => basic
* _0 => basic
* Precondition:
* User:A exists                                              -| UseCase//Create Post
* Post:A exists and it belongs to User:A                     _|


## Start with User_0

* Pull the Post into the commentsection context
* create Post_0 on User_0
* Instantiate the replyable relation, instantiate ThreadStarter
* Get the replyid from threadstarter

* save


## use case (I)  Run { 0*, 0*a, 0a*n => 1a, 1a*n => 2a }



### (*)  Main Scenario

1. Comment  (reply to Post )
2. Start with User_1
3. create Comment_0 on User_1
4. Find the ThreadStarter By ReplyId

* ThreadStarter::commentThread        (reply(id) -> CommentThread )

* CommentThread->attach(Comment)
* save

* (*a)      =>  Scenario Extension
* Comment Reply to Previous Comment

* Start with User _n
* create Comment on User _n

* Find the ThreadStarter By ReplyId

* ThreadStarter::commentThread        (reply(id) -> CommentThread )

* CommentThread->attach(Comment)
* save
* (*n)      =>  Repeat Use Case
* Main Scenario (again)

* Start with User_n
* create Comment on User_n

* Find the ThreadStarter By ReplyId

* ThreadStarter::commentThread        (reply(id) -> CommentThread )

* CommentThread->attach(Comment)
* save  
