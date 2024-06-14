import string
from collections import Counter


def analyseFile(nomFile):
    nblines = 0
    nbwords = 0
    listWord = []

    try:
        file = open(nomFile, 'r', encoding='utf-8')
        for line in file:
            nblines += 1
            m_line = line.split()
            for mot in m_line:
                mot_sans_ponctuation = str(mot.strip(string.punctuation))
                if mot_sans_ponctuation:
                    listWord.append(mot_sans_ponctuation)

        nbwords = len(listWord)
        mot_Frequence = Counter(listWord)

        mots_laplus_freq = mot_Frequence.most_common(10)

    except IOError:
        print("ERROR: Impossible d'ouvrir le fichier")
    file.close()
    sauvgarederAnalayse("resultats_analyse.txt", nblines, nbwords, mots_laplus_freq)

def sauvgarederAnalayse(nomFile, nombre_lignes, nombre_mots, motsFreq):
    try:
        file = open(nomFile, "w", encoding="utf-8")
        file.write("Nombre de lignes : " + str(nombre_lignes) + "\n")
        file.write("Nombre de mots : " + str(nombre_mots) + "\n")
        file.write("les dix mots les plus freq : \n")
        for mot, occurrence in motsFreq:
            file.write(mot.strip(string.punctuation) + " : " + str(occurrence) + "\n")
    except IOError:
        print("Impossible d'ouvrir le fichier ")
    file.close()


analyseFile("texte_source.txt")