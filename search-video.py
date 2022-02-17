from youtube_search import YoutubeSearch
import sys

search = ""

if len(sys.argv) > 1:
    search = sys.argv[1]

results = YoutubeSearch(search, max_results=15).to_json()
print(results)