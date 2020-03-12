#include <iostream>
#include <fstream>
#include <string>
#include <sstream>
#include <vector>

int main()
{
	std::string   inputLine = "";
	std::string   token     = ""; 
	std::ifstream csvFile("Results.csv");
	std::ofstream output("Results.docx");
	int           q, commentNum = -1, totalTaken = 0, totals[15][3] {0};

	std::string questions[] = { "How often do you use a C++ supplement (1 = often, 2 = at times, 3 = never)?",
                                "Would you like a C++ supplement tailored to CSI - CSIII?",
                                "Would you be interested in learning about C++ topics not discussed?",
                                "Would you be interested in having a deeper understanding of C++ topics discussed",
                                "Best device (1 = Desktop, 2 = Tablet, 3 = Phone)?",
                                "Color-coordination helps?",
                                "1 = Monospaced vs 2 = Proportional?",
                                "1 = Dark vs 2 = Light?",
                                "Fill-in / multiple choice?",
                                "Comment section?",
                                "Instant chat?",
                                "Been told that using namespace std; is not recommended?",
                                "Output of f = 0.2",
                                "Output of f = 0.25",
                                "Output of d = 0.0/0.0",
                                "Additional comments: "
	                          };
	std::vector<std::string> comments;
	
	if (csvFile.is_open()) {
		while (std::getline(csvFile, inputLine)) {
			q = -1;
			std::stringstream extractStream(inputLine);
			while (std::getline(extractStream, token, ',')) {
				if (q++ > 0 && q <= 16) { // && is a sequence point, so q is updated before RHS
					switch (std::stoi(token)) {
						case 1  : totals[q-2][0]++; break;
						case 2  : totals[q-2][1]++; break;
						case 3  : totals[q-2][2]++; break;
						default : perror("No valid element\n");
								   exit(1);
					}
				} else if (q == 17 && token != "") {
					++commentNum;
					comments.push_back(token);
				} else if (q > 17) {
					comments[commentNum] += token;
				}
			}
			++totalTaken;
		}
		
		for (int num = 0; num < 15; ++num) {
			output << questions[num] << ":\n";
			for (q = 0, q = 0; q < 3; ++q) 
				output << "\tQ" << num+1 << " - " << q+1 << ": " << totals[num][q]
					      << "  Percentage: " << static_cast<double>(totals[num][q]) / totalTaken << "%\n";
			std::endl(output);
		}
		for (auto e : comments)
			output << e << "\n\n";


	} else {
		output << "Results.csv Fail\n";
	}
}
