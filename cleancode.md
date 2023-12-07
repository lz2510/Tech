# Clean Code

## reference

https://medium.com/@ktiarad/clean-code-my-notes-2a289cbe97cc  
https://azeynalli1990.medium.com/clean-code-principles-for-daily-pr-reviews-1dc95e1f5246  

## Meaningful Names

Use intention revealing names: the method or variable names should explain itself what its intention is before even looking at code implementation.

Class names should be noun or noun phrase.

Method names should be verb.

Use Computer Science terms: AccountAdapter would mean adapter pattern for programmer, if there is not relevant computer science name use problem oriented name.

Pick one word for each concept: get, retrieve, fetch are interchangeable, choose one and use only it for all same actions.

Use pronounceable names/searchable names: Searching specific phrase in IDE will be easier.

## function

#### code smell selector argument, flag argument 

Use less inputs: 0 is good, 1–3 is ok, more than 3 inputs is awful. That means probably function is doing more than one task.

https://martinfowler.com/bliki/FlagArgument.html  
https://medium.com/thinkster-io/code-smell-selector-arguments-81f375cd7502  

Reading code from top to bottom: step-down rule should be applied. Nested functions should come after mother function, so as to have a nice book like reading feeling.

Have no side effects: function should do only one thing and it should do it properly without having bad effect on others’ state.

## comments

Don’t give too much info: comments should be precise and short.

Avoid obvious comment: if function is just calculating height, you don’t need to explain it extra in comment.

Good Comments:

- Legal comments
- Informative comments
- Clarifying obscure code
- Warning consequences

Bad Comments:

- Mumbling
- Redundant comments
- Misleading comments
- Mandated comments
- Journal comments
- Noise comments

## Error handling

Use exceptions when possible: rather than returning null or error flag, throw exceptions.

Provide context in exception: try to have well-formed exception handling strategy.

Don’t return null, don’t pass null.

## general

G29: Avoid Negative Conditionals

Negatives are just a bit harder to understand than positives. So, when possible, conditionals should be expressed as positives. For example:

        if (buffer.shouldCompact())
is preferable to

        if (!buffer.shouldNotCompact())

## formatting 

### The Newspaper Metaphor

Think of a well-written newspaper article. You read it vertically. At the top you expect a headline that will tell you what the story is about and allows you to decide whether it is something you want to read. The first paragraph gives you a synopsis of the whole story, hiding all the details while giving you the broad-brush concepts. As you continue down- ward, the details increase until you have all the dates, names, quotes, claims, and other minutia.

### Vertical Formatting

It appears to be possible to build significant systems out of files that are typically 200 lines long, with an upper limit of 500. 

#### Vertical Openness Between Concepts

Nearly all code is read left to right and top to bottom. Each line represents an expression or a clause, and each group of lines represents a complete thought. Those thoughts should be separated from each other with blank lines.

#### Vertical Density
If openness separates concepts, then vertical density implies close association. So lines of code that are tightly related should appear vertically dense.

#### Vertical Distance

1. Variable Declarations. Variables should be declared as close to their usage as possi- ble.

2. Instance variables, on the other hand, should be declared at the top of the class. 

3. Dependent Functions. If one function calls another, they should be vertically close, and the caller should be above the callee.


