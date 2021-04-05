# What is deadlock?  
Deadlock is a situation when two or more processes wait for each other to finish and none of them ever finish.  Consider an example when two trains are coming toward each other on same track and there is only one track, none of the trains can move once they are in front of each other.  Similar situation occurs in operating systems when there are two or more processes hold some resources and wait for resources held by other(s). 
# What are the necessary conditions for deadlock? 
Mutual Exclusion: There is a resource that cannot be shared. 
Hold and Wait: A process is holding at least one resource and waiting for another resource which is with some other process. 
No Preemption: The operating system is not allowed to take a resource back from a process until process gives it back. 
Circular Wait:  A set of processes are waiting for each other in circular form. 
# ref
https://www.geeksforgeeks.org/commonly-asked-operating-systems-interview-questions-set-1/
