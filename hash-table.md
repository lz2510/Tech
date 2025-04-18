# Hash Map

A hash map organizes data so you can quickly look up values for a given key.

## Strengths:
- **Fast lookups**: Lookups take O(1) time on average.
- **Flexible keys**: Most data types can be used for keys, as long as they're hashable.

## Weaknesses:
- **Slow worst-case**: Lookups take O(n) time in the worst case.
- **Unordered**: Keys aren't stored in a special order. If you're looking for the smallest key, the largest key, or all the keys in a range, you'll need to look through every key to find it.
- **Single-directional lookups**: While you can look up the value for a given key in O(1) time, looking up the keys for a given value requires looping through the whole dataset—O(n) time.
- **Not cache-friendly**: Many hash table implementations use linked lists, which don't put data next to each other in memory.

## Time Complexity
|        | AVERAGE | WORST |
|--------|---------|-------|
| Space  | O(n)    | O(n)  |
| Insert | O(1)    | O(n)  |
| Lookup | O(1)    | O(n)  |
| Delete | O(1)    | O(n)  |

## In PHP

In PHP, hash tables are called arrays.

    $lightBulbToHoursOfLight = [
      'incandescent' => 1200,
      'compact fluorescent' => 10000,
      'LED' => 50000
  ];
  
## When Hash Map operations cost O(n) time?

**Hash collisions**: If all our keys caused hash collisions, we'd be at risk of having to walk through all of our values for a single lookup (in the example above, we'd have one big linked list). This is unlikely, but it could happen. That's the worst case.

**Dynamic array resizing**: Suppose we keep adding more items to our hash map. As the number of keys and values in our hash map exceeds the number of indices in the underlying array, hash collisions become inevitable. To mitigate this, we could expand our underlying array whenever things start to get crowded. That requires allocating a larger array and rehashing all of our existing keys to figure out their new position—O(n) time.

## Hash maps are built on arrays

Arrays are pretty similar to hash maps already. Arrays let you quickly look up the value for a given "key" . . . except the keys are called "indices," and we don't get to pick them—they're always sequential integers (0, 1, 2, 3, etc).

Think of a hash map as a "hack" on top of an array to let us use flexible keys instead of being stuck with sequential integer "indices."

All we need is a function to convert a key into an array index (an integer). That function is called a hashing function.

![cs_for_hackers__hash_tables_lies_key_labeled](https://user-images.githubusercontent.com/1209204/211179573-4bcc639f-2712-44c4-a530-61e56d68dc92.svg)

To look up the value for a given key, we just run the key through our hashing function to get the index to go to in our underlying array to grab the value.

How does that hashing function work? There are a few different approaches, and they can get pretty complicated. But here's a simple proof of concept:

Grab the number value for each character and add those up.

<img width="277" alt="Screenshot 2023-01-08 at 11 49 53" src="https://user-images.githubusercontent.com/1209204/211179651-56786c92-a792-4950-9f85-e0e63bc0b03d.png">

The result is 429. But what if we only have 30 slots in our array? We'll use a common trick for forcing a number into a specific range: the modulus operator (%). Modding our sum by 30 ensures we get a whole number that's less than 30 (and at least 0):

429%30=9

## Hash collisions

What if two keys hash to the same index in our array? In our example above, look at "lies" and "foes":

<img width="310" alt="Screenshot 2023-01-08 at 11 51 57" src="https://user-images.githubusercontent.com/1209204/211179697-c5bba0bc-29cc-477c-a167-74ff17f17fc4.png">


They both sum up to 429! So of course they'll have the same answer when we mod by 30:

429%30=9

This is called a hash collision. There are a few different strategies for dealing with them.

Here's a common one: instead of storing the actual values in our array, let's have each array slot hold a pointer to a linked list holding the values for all the keys that hash to that index:

<img width="355" alt="Screenshot 2023-01-08 at 11 53 08" src="https://user-images.githubusercontent.com/1209204/211179722-05f2e392-e98e-4516-9328-0a1c94c44017.png">

Notice that we included the keys as well as the values in each linked list node. Otherwise we wouldn't know which key was for which value!
    
https://www.interviewcake.com/concept/php/hash-map  
https://github.com/TheAlgorithms/Java/tree/master/src/main/java/com/thealgorithms/datastructures/hashmap  
