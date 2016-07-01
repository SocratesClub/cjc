Twitter Sentimental Analysis
=========

This tool is an implementation of the [Twitter Sentiment analysis tool][1] 
described on [Laurent Luce's blog][2].

Requirements
------------
* [NLTK][3] and its dependencies

You may install NLTK by using pip:

    pip install nltk


How to use
----------

1. Clone this project
2. Install NLTK (if it is not installed)
3. Run the classifier

Or run the following commands:

    git clone git://github.com/victorneo/Twitter-Sentimental-Analysis.git twanalysis
    cd twanalysis
    pip install nltk
    python classification.py


Training data
-------------

The training data is obtained from the Twitter Search API with the keywords
`I am happy` and `I am sad` for happy (positive) and sad (negative) tweets.
There is a total of 160 tweets used for training (80 / 80 distribution).

To add more training data, add in new _happy_ tweets to `happy.txt` and _sad_ tweets
to `sad.txt` using one line for each new tweet.


Test data
---------

Test data are separated into `happy_test.txt` and `sad_test.txt`. A total of
20 tweets are used for test (10 / 10 distribution).

To add more test data, add in new _happy_ tweets to `happy_test.txt` and _sad_
tweets to `sad_test.txt` using one line for each new tweet.


[1]: http://www.laurentluce.com/posts/twitter-sentiment-analysis-using-python-and-nltk/
[2]: http://www.laurentluce.com/
[3]: http://www.nltk.org/
