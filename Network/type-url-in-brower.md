# What happens when you type a URL in the web browser?
A URL may contain a request to HTML, image file or any other type.

- If the content of the typed URL is in the cache and fresh, then display the content.
- Else find the IP address for the domain so that a TCP connection can be set up. Browser does a DNS lookup.
- Browser needs to know the IP address for a URL so that it can set up a TCP connection.  This is why browser needs DNS service. The browser first looks for URL-IP mapping browser cache, then in OS cache. If all caches are empty, then it makes a recursive query to the local DNS server.   The local DNS server provides the IP address.
- Browser sets up a TCP connection using three-way handshake.
- Browser sends a HTTP request.
- Server has a web server like Apache, IIS running that handles incoming HTTP request and sends an HTTP response.
- Browser receives the HTTP response and renders the content.
# ref
https://www.geeksforgeeks.org/commonly-asked-computer-networks-interview-questions-set-1/
