from flask import Flask, redirect, render_template, request, url_for

import helpers
import os
import sys
from analyzer import Analyzer
from flask import Flask, jsonify

app = Flask(__name__)

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/search")
def search():

    # validate screen_name
    screen_name = request.args.get("screen_name", "")
    if not screen_name:
        return redirect(url_for("index"))

    # get screen_name's tweets
    tweets = helpers.get_user_timeline(screen_name)

    positive, negative, neutral = 0.0, 0.0, 0.0
    # absolute paths to lists
    positives = os.path.join(sys.path[0], "positive-words.txt")
    negatives = os.path.join(sys.path[0], "negative-words.txt")
    
    # instantiate analyzer
    analyzer = Analyzer(positives, negatives)
    for tweet in tweets:
        score = analyzer.analyze(tweet)
        if score > 0.0:
            positive += 1.0
        elif score <0.0:
            negative += 1.0
        else:
            neutral += 1.0
            
    # generate chart
    chart = helpers.chart(positive, negative, neutral)

    # render results
    return render_template("search.html", chart=chart, screen_name=screen_name)



@app.route('/api/v1.0/tweets_analizer/<string:screen_name>', methods=['GET'])
def get_tweets(screen_name):
    if not screen_name :
        return jsonify({'Response':'404'})
    #include the tweets file 
    positives = os.path.join(sys.path[0], "positive-words.txt")
    negatives = os.path.join(sys.path[0], "negative-words.txt")
    
    # instantiate analyzer
    analyzer = Analyzer(positives, negatives)

    # tweets and scores to conform new dictionary with scores
    tweets = helpers.get_user_timeline(screen_name)
    scores = []
    for tweet in tweets : 
        scores.append(analyzer.analyze(tweet))

    tweets_with_scores={}

    for tweet, score in zip(tweets, scores):
        tweets_with_scores[tweet] = score


    
    return jsonify({'Response':'200','tweets_with_scores': tweets_with_scores})




if __name__ == '__main__' :
    app.run(debug=True)