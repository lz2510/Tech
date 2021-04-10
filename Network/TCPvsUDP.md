# What is TCP & UDP in the transport layer? What are their differences?
TCP (Transmission Control Protocol) is a connection-oriented service, which means it builds connection before transferring data and closes the connection after the transmission.
The reliability of TCP reflects on establishing a connection by a three-way handshake, and some mechanisms like error detection, flow control, congestion control, and retransmission. Those features will cost a lot of overhead and occupy the resources of processors.
TCP is often used in the file transmission, sending and receiving of mail, and remote login.
UDP (User Datagram Protocol) does not need to build a connection before the data transmission, which means that the remote host is not required to acknowledge after receiving UDP segments.
Although UDP cannot provide reliable transmission, it is the most effective service under certain situations (instant messaging in general), e.g., real-time audio and video streaming.

# ref
https://towardsdatascience.com/all-you-should-know-about-computer-network-in-technical-interviews-5478f45368ac
