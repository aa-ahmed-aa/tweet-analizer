from nltk.tokenize import TweetTokenizer


class Analyzer():
    """Implements sentiment analysis."""

    def __init__(self, positives, negatives):
        """Initialize Analyzer."""
        self.positive = []
        self.negative = []
        with open(positives) as file1:
        	for line in file1:
        		if line.startswith(";") or line.startswith("\n"):
        			continue
        		else:
        			self.positive.append(line.strip("\n"))

        with open(negatives) as file2:
        	for line in file2:
        		if line.startswith(";") or line.startswith("\n"):
        			continue
        		else:
        			self.negative.append(line.strip("\n"))


    def analyze(self, text):
        """Analyze text for sentiment, returning its score."""
        score = 0.0
        tknzr = TweetTokenizer()
        tokens = tknzr.tokenize(text)
        for word in tokens:
        	if str.lower(word) in self.positive:
        		score+=1.0
        	elif str.lower(word) in self.negative:
        		score-=1.0

        return score
