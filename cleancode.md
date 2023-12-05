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
Negatives are just a bit harder to understand than positives. So, when possible, condition-
als should be expressed as positives. For example:
    if (buffer.shouldCompact())
is preferable to
    if (!buffer.shouldNotCompact())


