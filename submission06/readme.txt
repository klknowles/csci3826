The site for submission06 is as complete as it will be.

The shopping cart works as expected. Most of the changes are implemented
from the Nature's Source reference material. One difference that may or may
not be an issue is how the shopping cart handles quantities. Instead of
allowing users to attempt to add a number exceeding the current inventory
to their cart, the backend script set the max value for the input element
to the current inventory number. We figured that the result is the same.
Despite that, there still exists logic in the script for adding items to
the shopping cart for redirecting to retry. Again, it is from the reference
material, and it does not seem to be problem to leave it there, considering
how late it is at this point.

There are likely validation errors we have not tested. We will cross our
fingers and hope that they are not so severe.

Update:
The registration form now validates that the two passwords entered match.
