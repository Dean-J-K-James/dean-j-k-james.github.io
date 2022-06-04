
## Introduction to Search Engine Optimisation

say seo changes constantly with the requirements not being fully known.

## Page Title

Perhaps the easiest and most impactful way of improving your website's search engine ranking is to provide a title using the `<title>` tag.

    <title>Example Title</title>

Located in the `<head>` part of a webpage, the `<title>` tag informs search engines of what sort of information will be on the page. The title is also a likely candidate for the SERP, or search engine results page, where it could be used to identify the page result.

For optimal search engine indexing, the title of a page should be a concise, meaningful string of up to 50 characters.

## Social Media Meta Tags

Social media is a great place to advertise your website; but to improve the number of visitors, your links need to stand out. Consider the screenshot of a tweet in *Figure 1*:

![Basic Link on Twitter](%CNTNT%/figure1.png)
> **Figure 1** - Basic Link on Twitter

Merely posting a link will result in a boring text-based URL. Most potential visitors will likely just skip over the link without even considering it. That is where social media meta tags become useful. Consider the following three meta tags:

    <meta property="og:title"       content="Title">
    <meta property="og:image"       content="https://www.example.com/thumbnail.png">
    <meta property="og:description" content="Description">

These tags form part of the open graph protocol (notice the "og" property) and provide pieces of information that can be used by social media sites to make your links more visually appealing. By placing these meta tags in the `<head>` section of a HTML document, your links will get formatted on social media, like in *Figure X*.

![Twitter Summary Card](%CNTNT%/figure1.png)
> **Figure 1** - Twitter Summary Card

Open graph protocol meta tags are the most popular, and will work on Facebook, Twitter, and LinkedIn. There are, however, some Twitter specific alternatives that should be considered.

    <meta name="twitter:card"        content="summary">
    <meta name="twitter:title"       content="Title">
    <meta name="twitter:image"       content="https://www.example.com/thumbnail.png">
    <meta name="twitter:description" content="Description">

These meta tags allow you to further customise your Twitter links by specifying the type and size of card to use. If these tags cannot be found, Twitter will fall back onto the open graph protocol tags.

More information can be found here: [Open Graph Protocol](https://ogp.me/).
